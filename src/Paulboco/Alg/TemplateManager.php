<?php namespace Paulboco\Alg;

use App;
use Config;
use File;
use Input;
use Request;
use Session;
use StdClass;
use Symfony\Component\Finder\Finder;

class TemplateManager {

	const TEMPLATE_CONFIG = 'TEMPLATE_CONFIG.php';

	/**
	 * An instance of finder.
	 *
	 * @ var Symfony\Component\Finder\Finder
	 */
	protected $finder;

	/**
	 * The path to write files to.
	 *
	 * @var string
	 */
	protected $path;

	/**
	 * An array of search values.
	 *
	 * @var array
	 */
	protected $search;

	/**
	 * An array of replacement values.
	 *
	 * @var array
	 */
	protected $replace;


	public function __construct(Finder $finder)
	{
		$this->finder = $finder;
	}

	/**
	 * Make the template array.
	 *
	 * @param  string  $path
	 * @param  string  $template
	 * @param  array
	 */
	public function make($path, $template, $tokens)
	{
		$this->path = $path;

		$this->buildReplaceArrays($tokens);

		$templatePath = $this->getTemplatePath($template);

		$iterator = $this->finder->sortByName()->in($templatePath);

		return $this->populateTemplateArray($iterator);
	}

	public function getAvailable()
	{
		$directory = $this->getTemplatePath();
		$templatesFound = File::directories($directory);

		$templates = [];
		foreach ($templatesFound as $template)
		{
			$basename = basename($template);
			$templates[$basename] = $basename;
		}

		return $templates;
	}

	public function getWritePath($file = '')
	{
		$path = $this->path ? '/' . $this->path . '/' : '/';
		$path = base_path() . $path . $file;
		$path = rtrim($path, '/');

		return str_replace(['//', '/\\'], '/', $path);
	}

	public function getTemplatePath($template = null)
	{
		$templatesPath = Config::get('alg::templates_path');
		$command = Session::get('alg.command.name');

		return realpath($templatesPath . '/' . $command . '/' . $template);
	}

	public function getConfig()
	{
		$path = Template::getTemplatePath() . '/' . Input::get('template');
		$config = $path . '/' . self::TEMPLATE_CONFIG;

		if (file_exists($config))
		{
			return include($config);
		}

		return [];
	}

	protected function buildReplaceArrays($tokens)
	{
		$this->search = array_keys($tokens);
		$this->replace = $tokens;
	}

	/**
	 * Populate the template array.
	 *
	 * @param  Symfony\Component\Finder\SplFileInfo $iterator
	 * @return array
	 */
	protected function populateTemplateArray($iterator)
	{
		$array = [];
		foreach ($iterator as $key => $value)
		{
			if (self::TEMPLATE_CONFIG != $value->getRelativePathname())
			{
				$array[] = $this->getTemplateInfo($value);
			}
		}

		return $array;
	}

	/**
	 * Get a template's information.
	 *
	 * @param  Symfony\Component\Finder\SplFileInfo $iterator
	 * @return StdClass
	 */
	protected function getTemplateInfo($iterator)
	{
		$file = $this->replaceTokens($iterator->getRelativePathname());
		$path = $this->getWritePath($file);

		$contents = '';
		if ($iterator->getType() == 'file')
		{
			$contents = $this->replaceTokens($iterator->getContents());
		}

		$info = new StdClass;
		$info->path = $path;
		$info->type = $iterator->getType();
		$info->exists = file_exists($path);
		$info->contents = $contents;

		return $info;
	}

	/**
	 * Replace tokens in the passed string.
	 *
	 * @param  string  $string
	 * @return string
	 */
	protected function replaceTokens($string)
	{
		return str_replace($this->search, $this->replace, $string);
	}


}