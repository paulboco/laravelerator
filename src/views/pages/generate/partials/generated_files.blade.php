@if (isset($files))
    <div class="row">
        <div class="col-md-12">
            <h3>Files to be created</h3>
            <div class="panel-group" id="accordion">
                @foreach ($files as $path => $contents)
                    <?php $in = $path == '/home/pbc/git/laravelerator/laravel-alg.dev/app/views/problems/_inputs.blade.php' ? ' in' : '' ?>
                    <div class="panel panel-default">
                        <div class="panel-heading directories" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ md5($path) }}">
                            {{ mute_base_path($path) }}
                        </div>
                        <div id="collapse-{{ md5($path) }}" class="panel-collapse collapse{{ $in }}">
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
