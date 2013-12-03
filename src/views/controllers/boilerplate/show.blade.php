@extends('laravelerator::layouts.master')

@section('content')
@if (isset($overwrites))
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1 class="error">Generation aborted!</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h4>The following files exist and will not be overwritten.</h4>
			<div class="overwrites">
				<pre>{{ mute_base_path(implode("\n", $overwrites)) }}</pre>
			</div>
		</div>
	</div>
@else
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1 class="success">Generation complete</h1>
			</div>
		</div>
	</div>
	@if (isset($files))
		<div class="row">
			<div class="col-md-12">
				<h3>Compiled command <small>click command to select</small></h3>
				<div class="directories">
					<input type="text" class="form-control" id="compiled-command" value="{{{ $compiledCommand }}}">
				</div>
			</div>
		</div>
	@endif
	@if (isset($directories))
		<div class="row">
			<div class="col-md-12">
				<h3>Directories to be created</h3>
				<div class="directories">
					<pre>{{ mute_base_path(implode("\n", $directories)) }}</pre>
				</div>
			</div>
		</div>
	@endif
	@if (isset($files))
		<div class="row">
			<div class="col-md-12">
				<h3>Files to be created</h3>
				<div class="directories">
					<pre>{{ mute_base_path(implode("\n", array_keys($files))) }}</pre>
				</div>
			</div>
		</div>
	@endif
	@if (isset($files))
		<div class="hr"></div>
		<div class="row">
			<div class="col-md-12">
				<h3>Generated files</h3>
				@foreach ($files as $path => $contents)
					<pre class="file-path">{{ mute_base_path($path) . "\n" }}</pre>
					<pre class="prettyprint linenums">{{ htmlentities($contents) }}</pre>
				@endforeach
			</div>
		</div>
	@endif
	@include('laravelerator::controllers.shared.display_tokens')
@endif
@stop

@section('scripts')
<script>
	$(document).ready(function() {
		$("#compiled-command").click(function() {
			$(this).select();
		});
	})
</script>
@stop
