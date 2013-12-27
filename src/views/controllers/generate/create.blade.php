<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h1>Generate <small>Create code from a template.</small></h1>
        </div>
    </div>
</div>
<div class="row" data-ng-controller="GenerateController">
    <div class="col-md-4">
        {{ Form::open(['action' => 'Laravelerator\Laravelerator\AngularController@generateStore', 'role' => 'form']) }}
            <!-- template -->
            <div class="form-group">
                {{ Form::label('template', '* Template') }}
                {{ Form::select('template', [null => '-- choose template --'], null, ['class' => 'form-control', 'ng-model' => 'template', 'ng-options' => 't.title for t in templatesAvailable track by t.basename']) }}
            </div>
            <!-- write path -->
            <div class="form-group write-path">
                {{ Form::label('path', '* Write Path') }}
                {{ Form::text('path', $path, ['class' => 'form-control',  'ng-model' => 'path', 'ng-change' => 'fetch()', 'ng-init' => $path]); }}
            </div>
            <div class="form-group">
                <span id="path-status" class="@{{pathDisplay.class}}">@{{pathDisplay.realpath}}<br>@{{pathDisplay.msg}}</span>
            </div>
            <!-- table name -->
            <div class="form-group">
                {{ Form::label('table', '* Table Name') }}
                {{ Form::text('table', $table, ['data-ng-model' => 'table', 'class' => 'form-control', 'required' => false]); }}
            </div>
            <!-- namespace -->
            <div class="form-group">
                {{ Form::label('namespace', '* Namespace') }}
                {{ Form::text('namespace', $namespace, ['class' => 'form-control']); }}
            </div>
            <!-- schema -->
            <div class="form-group">
                {{ Form::label('schema', '* Schema') }}
                {{ Form::textarea('schema', $schema, ['class' => 'form-control', 'rows' => 5]); }}
            </div>
            <!-- mock -->
            <div class="form-group">
                {{ Form::label('mock', 'Mock') }}
                <a id="mock-button" class="form-control btn" data-ng-class="{true: '', false: 'active'}[!mock]" data-ng-click="mock = !mock">@{{mock && 'Engaged' || 'Disengaged'}}</a>
                <input type="hidden" name="mock" value="@{{ mock }}">
            </div>
            <!-- button -->
            <div class="form-group">
                {{ Form::submit('Submit', ['class' => 'btn btn-default']) }}
            </div>
        {{ Form::close() }}
    </div>
    <div class="col-md-offset-1 col-md-4">
        @include('laravelerator::controllers.generate.partials.template_description')
    </div>
    <div class="col-md-3">
        @include('laravelerator::controllers.generate.partials.schema_notation')
    </div>
</div>
