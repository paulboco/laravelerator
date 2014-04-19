@if ($tokens = Laravelerator\Alg\Token::getAll())
    <div class="row">
        <div class="col-md-12">
            <h3>Tokens created</h3>
            <div class="directories" id="accordion-tokens">
                <table class="table">
                    <tbody>
                        @foreach ($tokens as $key => $value)
                            <tr>
                                <td width="10%">{{ $key }}</td>
                                <td>
                                    @if (substr_count($value, "\n" ))
                                        <div class="panel panel-default">
                                            <div class="panel-heading directories" data-toggle="collapse" data-parent="#accordion-files" href="#collapse-{{ $key }}">
                                                {{{ substr($value, 0, strpos($value, "\n"))  }}} ...
                                            </div>
                                            <div id="collapse-{{ $key }}" class="panel-collapse collapse">
                                                <pre class="prettyprint">{{{ $value }}}</pre>
                                            </div>
                                        </div>
                                    @else
                                        {{{ $value }}}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif
