@extends('laravelerator::layouts.master')

@section('subTitle', '- Generate')

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
            <div class="panel panel-default">
                <div class="panel-body directories">
                    <ul class="file-listing overwrites">
                        <li>
                            {{ mute_base_path(implode('</li><li>', $overwrites)) }}
                        </li>
                    </ul>
                </div>
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
                <div class="panel panel-default">
                    <div class="panel-body directories">
                    <ul class="file-listing">
                        <li>
                            {{ mute_base_path(implode('</li><li>', $directories)) }}
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @include('laravelerator::controllers.generate.partials.generated_files')
    @include('laravelerator::controllers.generate.partials.display_tokens')
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
