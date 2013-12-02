<?php namespace Paulboco\Alg;

use View;
use Controller;

class PagesController extends Controller {

	public function home()
	{
		View::share('subTitle', ' - home');

		return View::make('alg::pages.home');
	}


}