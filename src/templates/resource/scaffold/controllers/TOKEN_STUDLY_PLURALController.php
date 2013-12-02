<?php

use TOKEN_CLASS_NAMESPACE\TOKEN_STUDLY_SINGULAR;

class TOKEN_STUDLY_PLURALController extends BaseController {

	/**
	 * TOKEN_STUDLY_SINGULAR instance
	 *
	 * @var TOKEN_CLASS_NAMESPACE\TOKEN_STUDLY_SINGULAR
	 */
	protected $TOKEN_CAMEL_SINGULAR;


	public function __construct(TOKEN_STUDLY_SINGULAR $TOKEN_CAMEL_SINGULAR)
	{
		parent::__construct();

		$this->TOKEN_CAMEL_SINGULAR = $TOKEN_CAMEL_SINGULAR;
	}

	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$TOKEN_CAMEL_PLURAL = $this->TOKEN_CAMEL_SINGULAR->all();

		$this->layout->content = View::make('TOKEN_SNAKE_PLURAL.index', compact('TOKEN_CAMEL_PLURAL'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$this->layout->content = View::make('TOKEN_SNAKE_PLURAL.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Redirect
	 */
	public function store()
	{
		$TOKEN_CAMEL_SINGULAR = $this->TOKEN_CAMEL_SINGULAR->create(Input::all());

		if ($TOKEN_CAMEL_SINGULAR->save())
		{
			return Redirect::action('TOKEN_STUDLY_PLURALController@index')
				->with('alert.success', 'TOKEN_LABEL_SINGULAR was successfully created.');
		}

		return Redirect::action('TOKEN_STUDLY_PLURALController@create')
			->withInput()
			->withErrors($TOKEN_CAMEL_SINGULAR->getErrors())
			->with('alert.danger', 'Please correct the errors shown in red.');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 */
	public function edit($id)
	{
		$TOKEN_CAMEL_SINGULAR = $this->TOKEN_CAMEL_SINGULAR->find($id);

		if (is_null($TOKEN_CAMEL_SINGULAR))
		{
			return Redirect::action('TOKEN_STUDLY_PLURALController@index');
		}

		$this->layout->content = View::make('TOKEN_SNAKE_PLURAL.edit', compact('TOKEN_CAMEL_SINGULAR'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 */
	public function update($id)
	{
		$TOKEN_CAMEL_SINGULAR = $this->TOKEN_CAMEL_SINGULAR->find($id);

		if ($TOKEN_CAMEL_SINGULAR->update(Input::all()))
		{
			return Redirect::action('TOKEN_STUDLY_PLURALController@index')
				->with('alert.success', 'TOKEN_LABEL_SINGULAR was successfully updated.');
		}

		return Redirect::action('TOKEN_STUDLY_PLURALController@edit', [$id])
			->withInput()
			->withErrors($TOKEN_CAMEL_SINGULAR->getErrors())
			->with('alert.danger', 'Please correct the errors shown in red.');
	}


}
