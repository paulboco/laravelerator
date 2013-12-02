<?php namespace Paulboco\Alg\Composers;

use Input;
use Paulboco\Alg\Template;

class WritePathDisplayComposer {

    public function compose($view)
    {
    	$data = $this->buildDisplay();

        $view->with($data);
    }

    protected function buildDisplay()
    {
		$path = Template::getWritePath(Input::get('path'));

		if (is_dir($path))
		{
			$path = realpath($path);

			if (str_contains($path, base_path()))
			{
				$class = 'path-found';
				$msg = $path == base_path() ? ' (project root)' : '';
			}
			else
			{
				$class = 'path-outside-root';
				$msg = '<br>Error! You may not write outside the project root.';
			}
		}
		else
		{
			$class = 'path-not-found';
			$msg = '';
		}

		return compact('path', 'class', 'msg');
    }


}