@extends('laravelerator::layout')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="page-header">
			<h1>Boilerplate <small>Create boilerplate code.</small></h1>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		{{ Form::open(['action' => 'Laravelerator\Laravelerator\BoilerplateController@show', 'class' => 'form-horizontal', 'role' => 'form']) }}
			{{ Form::hidden('table', '') }}
			{{ Form::hidden('schema', '') }}
			{{ Form::hidden('path', '') }}
			{{ Form::groupSelect('template', '* Select template', $templatesAvailable + ['foo' => 'foo'], $template, [], [4,8]) }}
			{{ Form::groupText('namespace', '* Namespace', $namespace, [], [4,8]) }}
			<div class="form-group">
				<label for="mock" class="col-md-4 control-label">Mock</label>
				<div class="col-md-8">
					<button id="mock-button" type="button" class="form-control btn btn-primary" data-toggle="button"></button>
					{{ Form::hidden('mock', $mock, ['id' => 'mock-hidden']) }}
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-offset-4 col-md-8">
					{{ Form::submit('Submit', ['class' => 'btn btn-default']) }}
				</div>
			</div>
		{{ Form::close() }}
	</div>

	<div class="col-md-3">
		<div id="template-description"></div>
	</div>

	<div class="col-md-3">
	</div>
</div>
@stop

@include('laravelerator::partials.scripts.create')