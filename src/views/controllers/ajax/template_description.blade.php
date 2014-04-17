<aside>
	<h4>Template Description</h4>
	@if (isset($title))
		<div class="panel panel-default">
			<div class="panel-body">
				<h4>{{ $title }}</h4>
				<p>{{ $description }}</p>
			</div>
		</div>
	@else
		<span class="help-block">Template load error</span>
	@endif
</aside>