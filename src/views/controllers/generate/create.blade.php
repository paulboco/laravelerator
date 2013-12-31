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
            <select-template></select-template>

            <div data-ng-show="$state.current.data.template">
                <!-- write path -->
                <input-path></input-path>

                <!-- table name -->
                <input-table data-ng-show="$state.current.data.template.fields.table"></input-table>

                <!-- namespace -->
                <input-namespace data-ng-show="$state.current.data.template.fields.namespace" data-ng-show="false"></input-namespace>

                <!-- schema -->
                <input-schema data-ng-show="$state.current.data.template.fields.schema" data-ng-show="false"></input-schema>

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
