<?php namespace Paulboco\Alg\Console;

use Illuminate\Console\Command;
use File;
use Paulboco\Alg\Manifest;
use Paulboco\Alg\Template;

class BaseCommand extends Command {

	/**
	 * Get the write path option.
	 *
	 * @return string|null
	 */
	protected function getWritePath()
	{
		$write_path = $this->option('path');

		$path = Template::getWritePath($write_path);

		if (is_dir($path))
		{
			return $write_path;
		}

		$this->error("\nCould not find directory '{$write_path}'. Aborting!\n");

		return false;
	}

	/**
	 * Get the template option.
	 *
	 * @return string|null
	 */
	protected function getTemplate()
	{
		$template = $this->argument('template');

		$path = Template::getTemplatePath($template);

		if (is_dir($path))
		{
			return $template;
		}

		$this->error("\nCould not find template '{$template}'. Aborting!\n");
	}

	/**
	 * Create directories.
	 *
	 * @return null
	 */
	protected function createDirectories()
	{
		$directories = Manifest::getDirectories();

		if ( ! $directories) return;

		$this->showWriteCommentFor('directories', $directories);

		if ($this->mock) return;

		foreach ($directories as $directory)
		{
			File::makeDirectory($directory, 0755);
		}
	}

	/**
	 * Create files.
	 *
	 * @return null
	 */
	protected function createFiles()
	{
		$files = Manifest::getFiles();

		if ( ! $files)
		{
			$this->comment('No files were generated!');

			return;
		}

		$this->showWriteCommentFor('files', $files);

		if ($this->mock) return;

		foreach ($files as $path => $contents)
		{
			File::put($path, $contents);
		}
	}

	protected function showWriteCommentFor($type, $collection)
	{
		$type = "Writing {$type} ...";

		$mode = $this->mock ? '[Simulation] ' : '';

		$this->comment($mode . $type);

		$this->info(implode("\n", array_keys($collection)));
	}


}
