<?php namespace Paulboco\Alg;

class SchemaParser {

	protected $schema;
	protected $length;


	/**
	 * Parse the schema string. (Credit to Jeffrey Way)
	 *
	 * @author Jeffrey Way
	 * @param  string  $schema
	 * @return array
	 */
	public function make($input)
	{
		if ( ! $input) return false;

		$input = $this->formatInput($input);

		$schema = $this->parseInput($input);

		foreach($schema as &$column)
		{
			$columnInfo = explode(':', $column);

			$column = new \StdClass;
			$column->name = array_shift($columnInfo);
			$column->label = $this->createLabel($column->name);
			$column->type = $this->parseType(array_shift($columnInfo));

			$column->length = $this->length;

			// If there is a third key, then the user
			// is setting any number of options.
			if ( ! empty($columnInfo))
			{
				$column->options = '';
				foreach($columnInfo as $option)
				{
					$column->options .= (str_contains($option, '('))
						? "->{$option}"
						: "->{$option}()";
				}
			}
		}

		$this->schema = $schema;

		return $schema;
	}

	public function formatInput($schema)
	{
		$search = ['/ /', "/\r\n/", '/,+/', '/,$/'];
		$replace = ['', ',', ',', ''];

		$schema = preg_replace($search, $replace, $schema);

		return trim($schema, ',');
	}

	protected function parseInput($schema)
	{
		return explode(',', $schema);
	}

	protected function parseType($string)
	{
		preg_match('/^[a-z][a-z0-9]*/', $string, $matches);
		$type = $matches[0];

		preg_match('/(?<=\()[0-9.]*(?=\))/', $string, $matches);

		if (empty($matches))
		{
			$this->length = null;

			return $type;
		}

		// TODO:  this looks odd.
		$length = $matches[0];
		$this->length = str_replace('.', ',', $length);

		return $type;
	}

	/**
	 * Create a label from the column name.
	 *
	 * @param  string  $column
	 * @return string
	 */
	protected function createLabel($column)
	{
		$column = str_replace('_', ' ', $column);

		return ucwords($column);
	}

	public function __toString()
	{
		if ($this->schema)
		{
			$schema = $this->parseInput($schema);

			return implode(',', $schema);
		}

		return '';
	}


}