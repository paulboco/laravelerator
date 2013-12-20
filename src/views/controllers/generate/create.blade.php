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
    <div class="col-md-5">
        {{ Form::open(['action' => 'Laravelerator\Laravelerator\GenerateController@show', 'class' => 'form-horizontal', 'role' => 'form']) }}
            <div class="form-group">
                {{ Form::label('template', '* Template') }}
                {{ Form::select('template', [null => '-- choose template --'], null, ['class' => 'form-control', 'ng-model' => 'template', 'ng-options' => 't.title for t in templates track by t.basename']) }}
            </div>
            <div class="form-group">
                {{ Form::label('path', '* Write Path') }}
                {{ Form::text('path', $path, ['class' => 'form-control']); }}
            </div>
            <!-- path status -->
            <div class="row real-write-path">
                <div id="path-status"></div>
            </div>
            <div class="form-group">
                {{ Form::label('table', '* Table Name') }}
                {{ Form::text('table', $table, ['class' => 'form-control']); }}
            </div>
            <div class="form-group">
                {{ Form::label('namespace', '* Namespace') }}
                {{ Form::text('namespace', $namespace, ['class' => 'form-control']); }}
            </div>
            <div class="form-group">
                {{ Form::label('schema', '* Schema') }}
                {{ Form::textarea('schema', $schema, ['class' => 'form-control']); }}
            </div>
            <!-- mock -->
            <div class="form-group">
                {{ Form::label('mock', 'Mock') }}
                <button id="mock-button" type="button" class="form-control btn btn-primary" data-toggle="button"></button>
                {{ Form::hidden('mock', $mock, ['id' => 'mock-hidden']) }}
            </div>
            <!-- button -->
            <div class="form-group">
                {{ Form::submit('Submit', ['class' => 'btn btn-default']) }}
            </div>
        {{ Form::close() }}
    </div>
    <div class="col-md-4">
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

    <!-- Get available templates -->
    <script type="text/javascript">
        function TemplateController($scope, $http) {
            var url = '{{ action('Laravelerator\Laravelerator\AjaxController@templatesAvailable') }}';
            $http({
                method  : 'GET',
                params  : {'_token': '{{ Session::token() }}'},
                url     : url
            })
            .success(function(templates, status, headers, config) {
                console.log(templates);
                $scope.templates = templates;
            });
        }
    </script>
@stop
