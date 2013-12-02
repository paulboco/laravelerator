<?php namespace Paulboco\Alg;

use Input;
use Request;
use Session;
use View;

class AjaxController extends BaseController {

	/**
	 * Ajax request for write path display
	 */
	public function path()
	{
		return View::make('alg::partials.write_path_display');
	}

	/**
	 * Ajax request for selected template description
	 */
	public function template()
	{
    	$data = Template::getConfig();

		return View::make('alg::partials.template_description', $data);
	}


}