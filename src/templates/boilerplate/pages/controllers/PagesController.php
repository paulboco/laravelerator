<?php

use TOKEN_CLASS_NAMESPACE\Page;

class PagesController extends BaseController {

	/**
	 * Page instance
	 *
	 * @var TOKEN_CLASS_NAMESPACE\Page
	 */
	protected $page;


	public function __construct(Page $page)
	{
		parent::__construct();

		$this->page = $page;
	}

	/**
	 * Display the home page.
	 */
	public function home()
	{
		$page = $this->page->all();

		$this->layout->content = View::make('pages.home', compact('page'));
	}


}
