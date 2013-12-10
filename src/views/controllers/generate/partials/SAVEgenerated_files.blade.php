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
