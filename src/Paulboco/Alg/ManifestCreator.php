<?php namespace Paulboco\Alg;

use Input;

class ManifestCreator {

	protected $directories;
	protected $files;
	protected $overwrites;


	public function wasCreated($input)
	{
		extract($input);

		$tokens = Token::make($table, $namespace, $schema);

		$templates = Template::make($path, $template, $tokens);

		$this->createManifest($templates);

		return ! $this->hasOverwrites();
	}

	public function createManifest($files)
	{
		foreach ($files as $file)
		{
			if ($file->type == 'file')
			{
				if ($file->exists)
				{
					$this->overwrites[] = $file->path;
				}
				else
				{
					$this->files[$file->path] = $file->contents;
				}
			}
			elseif ($file->type == 'dir' && ! $file->exists)
			{
				$this->directories[$file->path] = $file->path;
			}
		}
	}

	public function hasOverwrites()
	{
		return $this->overwrites !== null;
	}

	public function getDirectories()
	{
		return $this->directories;
	}

	public function getFiles()
	{
		return $this->files;
	}

	public function getOverwrites()
	{
		return $this->overwrites;
	}

	public function getErrors()
	{
		$msg = implode("\n ", $this->getOverwrites());

		return "\nAborting! The following files exist and " .
		       "will not be overwritten:\n {$msg}\n";
	}


}