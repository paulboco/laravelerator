<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h1>Generate <small>Create code from a template.</small></h1>
        </div>
    </div>
</div>
<div class="row">
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
                <input data-ng-model="$state.current.data.path" data-ng-change="fetch($state.current.data.path)" name="path" class="form-control">
            </div>
            <div class="form-group">
                <span id="path-status" class="@{{pathDisplay.class}}">@{{pathDisplay.realpath}}<br>@{{pathDisplay.msg}}</span>
            </div>
            <!-- table name -->
            <div class="form-group">
                {{ Form::label('table', '* Table Name') }}
                <input data-ng-model="$state.current.data.table" name="table" class="form-control">
            </div>
            <!-- namespace -->
            <div class="form-group">
                {{ Form::label('namespace', '* Namespace') }}
                <input data-ng-model="$state.current.data.namespace" name="namespace" class="form-control">
            </div>
            <!-- schema -->
            <div class="form-group">
                {{ Form::label('schema', '* Schema') }}
                <textarea data-ng-model="$state.current.data.schema" name="schema" class="form-control" rows="5"></textarea>
            </div>
            <!-- mock -->
            <div class="form-group">
                {{ Form::label('mock', 'Mock') }}
                <a id="mock-button" class="form-control btn" data-ng-class="{true: '', false: 'active'}[!$state.current.data.mock]" data-ng-click="$state.current.data.mock = !$state.current.data.mock">@{{$state.current.data.mock && 'Engaged' || 'Disengaged'}}</a>
                <input type="hidden" name="mock" value="@{{ $state.current.data.mock }}">
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
