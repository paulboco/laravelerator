@if ($tokens = Laravelerator\Alg\Token::getAll())
	<div class="row">
		<div class="col-md-12">
			<h3>Tokens created</h3>
			<div class="directories">
                <table class="table">
                    <tbody>
                        @foreach ($tokens as $key => $value)
                            <tr>
                                <td>{{ $key }}</td>
                                <td><pre>{{{ $value }}}</pre></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
			</div>
		</div>
	</div>
@endif
