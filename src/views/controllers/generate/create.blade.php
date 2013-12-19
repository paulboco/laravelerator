@extends('laravelerator::layouts.master')

@section('subTitle', '- Generate')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h1>Generate <small>Create code from a template.</small></h1>
        </div>
    </div>
</div>
<div class="row" ng-controller="TemplateController">
    <div class="col-md-6">
        {{ Form::open(['action' => 'Laravelerator\Laravelerator\GenerateController@show', 'class' => 'form-horizontal', 'role' => 'form']) }}
            {{ Form::groupSelect('template', '* Select template', [null => '-- choose template --'], null, ['ng-model' => 'template', 'ng-options' => 't.title for t in templates track by t.basename'], [4,8]) }}
            {{ Form::groupText('path', 'Write Path', $path, [], [4,8]) }}
            <!-- path status -->
            <div class="row real-write-path">
                <div class="col-md-offset-4 col-md-8">
                    <div id="path-status"></div>
                </div>
            </div>
            {{ Form::groupText('table', '* Table name', $table, [], [4,8]) }}
            {{ Form::groupText('namespace', '* Namespace', $namespace, [], [4,8]) }}
            {{ Form::groupTextarea('schema', 'Schema', $schema, [], [4,8], 4) }}
            <!-- mock -->
            <div class="form-group">
                <label for="mock" class="col-md-4 control-label">Mock</label>
                <div class="col-md-8">
                    <button id="mock-button" type="button" class="form-control btn btn-primary" data-toggle="button"></button>
                    {{ Form::hidden('mock', $mock, ['id' => 'mock-hidden']) }}
                </div>
            </div>
            <!-- button -->
            <div class="form-group">
                <div class="col-md-offset-4 col-md-8">
                    {{ Form::submit('Submit', ['class' => 'btn btn-default']) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>
    <div class="col-md-3">
        @include('laravelerator::controllers.generate.partials.template_description')
    </div>
    <div class="col-md-3">
        @include('laravelerator::controllers.generate.partials.schema_notation')
    </div>
</div>
@stop

@include('laravelerator::assets.js.laravelerator')

@section('scripts')
    @parent
    <script type="text/javascript">
    function TemplateController($scope, $http) {

        $http({
            method  : 'GET',
            params  : {'_token': '{{ Session::token() }}'},
            url     : '{{ action('Laravelerator\Laravelerator\AjaxController@templatesAvailable') }}',
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
        })
        .success(function(templates, status, headers, config) {
            console.log(templates);
            $scope.templates = templates;
        });
    }
</script>
@stop
