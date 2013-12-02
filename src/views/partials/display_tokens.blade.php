@if ($tokens = Laravelerator\Alg\Token::get())
	<div class="row">
		<div class="col-md-12">
			<h3>Tokens created</h3>
			<div class="directories">
				<pre>
@foreach ($tokens as $key => $value)
{{ $key }} => {{ $value }}&nbsp;
@endforeach
				</pre>
			</div>
		</div>
	</div>
@endif
