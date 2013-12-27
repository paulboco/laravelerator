<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h1>Generate <small>Create code from a template.</small></h1>
        </div>
    </div>
</div>
<div class="row" ng-controller="GenerateController">
    <div class="col-md-4">
        {{ Form::open(['action' => 'Laravelerator\Laravelerator\GenerateController@show', 'role' => 'form']) }}
            <div class="form-group">
                {{ Form::label('template', '* Template') }}
                {{ Form::select('template', [null => '-- choose template --'], null, ['class' => 'form-control', 'ng-model' => 'template', 'ng-options' => 't.title for t in templates track by t.basename']) }}
            </div>




            <!-- angular -->
            <div class="form-group" sng-controller="PathController">
                {{ Form::label('path', '* Write Path') }}
                {{ Form::text('path', $path, ['class' => 'form-control',  'ng-model' => 'path', 'ng-change' => 'fetch()', 'ng-init' => $path]); }}
            </div>
            <div class="form-group">
                <span id="path-status" class="@{{pathDisplay.class}}">@{{pathDisplay.realpath}}<br>@{{pathDisplay.msg}}</span>
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
                {{ Form::textarea('schema', $schema, ['class' => 'form-control', 'rows' => 5]); }}
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
    <div class="col-md-5">
        @include('laravelerator::controllers.generate.partials.template_description')
    </div>
    <div class="col-md-3">
        @include('laravelerator::controllers.generate.partials.schema_notation')
    </div>
</div>


    <!-- Get available templates -->
    <script type="text/javascript">
        function GenerateController($scope, $http) {
            // Load the templates
            var url = '{{ action('Laravelerator\Laravelerator\AjaxController@templatesAvailable') }}';
            $http({
                method  : 'GET',
                params  : {'_token': '{{ Session::token() }}'},
                url     : url
            })
            .success(function(templates) {
                $scope.templates = templates;
            });

            // Fetch write path info
            $scope.fetch = function() {
                var url = '{{ action('Laravelerator\Laravelerator\AjaxController@path') }}';
                $http({
                    method  : 'GET',
                    params  : {'_token': '{{ Session::token() }}', 'path': $scope.path},
                    url     : url
                })
                .success(function(data) {
                    $scope.pathDisplay = data;
                });
            };

            $scope.fetch();
        }
    </script>
