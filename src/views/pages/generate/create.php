<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h1>Generate <small>Create code from a template.</small></h1>
        </div>
    </div>
</div>
<form name="form" ng-submit="submit()" novalidate>
<div class="row">
    <div class="col-md-4">
        <!-- select template -->
        <template-select></template-select>
        <div data-ng-if="$state.current.data.template">
            <data-ng-include src="'/laravelerator/template-description'"></data-ng-include>
        </div>
    </div>
    <div class="col-md-3">
        <div data-ng-if="$state.current.data.template">
                <!-- write path -->
                <path-input></path-input>

                <!-- table name -->
                <table-input
                    data-ng-if="$state.current.data.template.fields.table"></table-input>

                <!-- namespace -->
                <namespace-input
                    data-ng-if="$state.current.data.template.fields.namespace"></namespace-input>

                <!-- schema -->
                <schema-input
                    data-ng-if="$state.current.data.template.fields.schema"></schema-input>

                <!-- mock -->
                <mock-button></mock-button>

                <!-- button -->
                <div class="form-group">
                    <button class="btn btn-default" ng-disabled="form.$invalid">Submit</button>
                </div>
            </div>
    </div>
    <div class="col-md-offset-1 col-md-3"
        data-ng-if="$state.current.data.template.fields.schema">
        <data-ng-include src="'/laravelerator/schema-notation'"></data-ng-include>
    </div>
</div>
</form>
