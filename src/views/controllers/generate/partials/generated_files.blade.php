@if (isset($files))
    <div class="hr"></div>
    <div class="row">
        <div class="col-md-12">
            <h3>Generated files</h3>
            <div class="panel-group" id="accordion">
                @foreach ($files as $path => $contents)
                    <div class="panel panel-default">
                        <div class="panel-heading file-path">
                            <h5 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ md5($path) }}">
                                    {{ mute_base_path($path) }}
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-{{ md5($path) }}" class="panel-collapse collapse">
                            <div class="panel-body">
                                <pre class="prettyprint linenums">{{ htmlentities($contents) }}</pre>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
