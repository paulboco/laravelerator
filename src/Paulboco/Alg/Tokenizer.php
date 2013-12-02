<?php namespace Paulboco\Alg;

class Tokenizer {

	protected $tokens;


	/**
	 * Make the token replacements array.
	 *
	 * @param  string  $table
	 * @param  string  $namespace
	 * @param  array   $schema
	 * @return array
	 */
	public function make($table, $namespace, $schema)
	{
		$this->addForTable($table);
		$this->addForNamespace($namespace);
		$this->addForSchema($schema);

		return $this->tokens;
	}

	protected function addForTable($table)
	{
		if ($table)
		{
			$this->tokens['TOKEN_SNAKE_SINGULAR'] = str_singular($table);
			$this->tokens['TOKEN_SNAKE_PLURAL'] = $table;
			$this->tokens['TOKEN_STUDLY_SINGULAR'] = studly_case(str_singular($table));
			$this->tokens['TOKEN_STUDLY_PLURAL'] = studly_case(str_plural($table));
			$this->tokens['TOKEN_CAMEL_SINGULAR'] = camel_case(str_singular($table));
			$this->tokens['TOKEN_CAMEL_PLURAL'] = camel_case(str_plural($table));
			$this->tokens['TOKEN_LABEL_SINGULAR'] = ucwords(str_replace('_', ' ', str_singular($table)));
			$this->tokens['TOKEN_LABEL_PLURAL'] = ucwords(str_replace('_', ' ', str_plural($table)));
		}
	}

	protected function addForNamespace($namespace)
	{
		if ($namespace)
		{
			$this->tokens['TOKEN_CLASS_NAMESPACE'] = $namespace;
			$this->tokens['TOKEN_FILE_NAMESPACE'] = str_replace('\\', '/', $namespace);
		}
	}

	protected function addForSchema($schema)
	{
		$schema = Schema::make($schema);

		if ($schema)
		{
			$this->tokens['TOKEN_VALIDATION_RULES'] = $this->validationRules($schema);
			$this->tokens['TOKEN_FORM_INPUTS'] = $this->formInputs($schema);
		}
	}

	public function get()
	{
		return $this->tokens;
	}

	/**
	 * Get the validation rules snippet.
	 *
	 * @param  array  $schema
	 * @return string
	 */
	protected function validationRules($schema)
	{
		if (empty($schema)) return "\t\t// 'field' => 'required',";

		$rules = '';
		foreach ($schema as $column)
		{
			$rules .= "\t\t'{$column->name}' => 'required',\n";
		}

		return rtrim($rules, "\n");
	}

	/**
	 * Get the form inputs snippet.
	 *
	 * @param  array  $schema
	 * @return string
	 */
	protected function formInputs($schema)
	{
		if (empty($schema)) return "\t\t<!-- form inputs -->";

		$inputs = '';
		foreach ($schema as $column)
		{
			$inputs .= "\t\t{{ Form::groupText('{$column->name}', '{$column->label}', null, [], [4,8]) }}\n";
		}

		return rtrim($inputs);
	}


}