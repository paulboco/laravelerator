<?php

/*
|--------------------------------------------------------------------------
| Group Text
|--------------------------------------------------------------------------
*/

Form::macro('groupText', function($name, $label = null, $value = null, $attributes = [], $cols)
{
	$element = Form::text($name, $value, fieldAttributes($name, $attributes));

	return groupWrapper($name, $label, $element, $cols);
});

/*
|--------------------------------------------------------------------------
| Group Textarea
|--------------------------------------------------------------------------
*/

Form::macro('groupTextarea', function($name, $label = null, $value = null, $attributes = [], $cols, $rows = null)
{
	if ($rows)
	{
		$attributes = array_merge($attributes, ['rows' => $rows]);
	}

	$element = Form::textarea($name, $value, fieldAttributes($name, $attributes));

	return groupWrapper($name, $label, $element, $cols);
});

/*
|--------------------------------------------------------------------------
| Group Password
|--------------------------------------------------------------------------
*/

Form::macro('groupPassword', function($name, $label = null, $attributes = [], $cols)
{
	$element = Form::password($name, fieldAttributes($name, $attributes));

	return groupWrapper($name, $label, $element, $cols);
});

/*
|--------------------------------------------------------------------------
| Group Select
|--------------------------------------------------------------------------
*/

Form::macro('groupSelect', function($name, $label = null, $options, $value = null, $attributes = [], $cols)
{
	$element = Form::select($name, $options, $value, fieldAttributes($name, $attributes));

	return groupWrapper($name, $label, $element, $cols);
});

/*
|--------------------------------------------------------------------------
| Group Multi-Select
|--------------------------------------------------------------------------
*/

Form::macro('groupSelectMultiple', function($name, $label = null, $options, $value = null, $attributes = [], $cols)
{
	$attributes = array_merge($attributes, ['multiple' => true]);

	$element = Form::select($name, $options, $value, fieldAttributes($name, $attributes));

	return groupWrapper($name, $label, $element, $cols);
});

/*
|--------------------------------------------------------------------------
| Group Checkbox
|--------------------------------------------------------------------------
*/

Form::macro('groupCheckbox', function($name, $label = null, $value = 1, $checked = null, $attributes = [], $cols)
{
	$attributes = array_merge(['id' => 'id-field-' . $name], $attributes);

	$out = '<div class="form-group">';
	$out .= '<div class="col-md-offset-' . $cols[0] . ' col-md-' . $cols[1] . '">';
	$out .= '<div class="checkbox' . fieldError($name) . '">';
	$out .= '<label>';
	$out .= Form::checkbox($name, $value, $checked, $attributes) . ' ' . $label;
	$out .= '</label>';
	$out .= '</div></div></div>';

	return $out . PHP_EOL;
});

/*
|--------------------------------------------------------------------------
| Group Submit
|--------------------------------------------------------------------------
*/

Form::macro('groupSubmit', function($action, $cols, $submit = 'Submit', $cancel = 'Cancel')
{
	$submitButton = Form::submit($submit, ['class' => 'btn btn-primary']);
	$cancelButton = link_to_action($action, $cancel, null, ['class' => 'btn btn-default']);

	$out = '<div class="form-group">';
	$out .= $cols ? '<div class="col-md-offset-' . $cols[0] . ' col-md-' . $cols[1] . '">' : '';
	$out .= "{$submitButton} {$cancelButton}";
	$out .= $cols ? '</div>' : '';
	$out .= '</div>';

	return $out . PHP_EOL;
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
*/

function groupWrapper($name, $label, $element, $cols)
{
	$out = '<div class="form-group' . fieldError($name) . '">';
	$out .= fieldLabel($name, $label, $cols);
	$out .= $cols ? '<div class="col-md-' . $cols[1] . '">' : '';
	$out .= $element;
	$out .= errorBlock($name);
	$out .= $cols ? '</div>' : '';
	$out .= '</div>';

	return $out . PHP_EOL;
}

function errorBlock($field)
{
	if ($errors = Session::get('errors'))
	{
		return $errors->first($field, '<span id="field-error-' . $field . '" class="help-block">:message</span>');
	}
}

function fieldError($field)
{
	if ($errors = Session::get('errors'))
	{
		return $errors->first($field) ? ' has-error' : '';
	}
}

function fieldLabel($name, $label, $cols)
{
	if (is_null($label)) return '';

	$name = str_replace('[]', '', $name);

	$colClass = $cols ? ' col-md-' . $cols[0] : '';

	$out = '<label for="id-field-' . $name . '" class="control-label' . $colClass . '">';
	$out .= $label . '</label>';

	return $out;
}

function fieldAttributes($name, $attributes = [])
{
	$name = str_replace('[]', '', $name);

	$attributes['id'] = 'id-field-' . $name;

	if (isset($attributes['class']))
	{
		$attributes['class'] = 'form-control ' . $attributes['class'];
	}
	else
	{
		$attributes['class'] = 'form-control';
	}

	return $attributes;
}
