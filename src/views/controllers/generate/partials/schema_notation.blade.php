<aside id="schema-notation">
	<h4>Schema Notation</h4>
	<ul class="list-group">
		@foreach ($schemaNotation as $notation => $method)
			<li class="list-group-item" data-toggle="popover" data-placement="left" data-original-title="Laravel Equivalent" data-content="{{{ $method }}}">
				<span>{{ $notation }}</span>
			</li>
		@endforeach
	</ul>
</aside>
