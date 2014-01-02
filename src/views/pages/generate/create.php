<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h1>Generate <small>Create code from a template.</small></h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <!-- select template -->
        <form name="form-1" ng-submit="submit()">
            <template-select></template-select>
        </form>
        <div data-ng-show="$state.current.data.template">
            <data-ng-include src="'/laravelerator/template-description'"></data-ng-include>
        </div>
    </div>
    <div class="col-md-3">
        <!-- <data-ng-include src="'/laravelerator/template-description'"></data-ng-include> -->
        <div data-ng-show="$state.current.data.template">
            <form name="form-2" ng-submit="submit()">
                <!-- write path -->
                <path-input></path-input>

                <!-- table name -->
                <table-input data-ng-show="$state.current.data.template.fields.table"></table-input>

                <!-- namespace -->
                <namespace-input data-ng-show="$state.current.data.template.fields.namespace" data-ng-show="false"></namespace-input>

                <!-- schema -->
                <schema-input data-ng-show="$state.current.data.template.fields.schema" data-ng-show="false"></schema-input>

                <!-- mock -->
                <mock-button></mock-button>

                <!-- button -->
                <div class="form-group">
                    <input class="btn btn-default" type="submit" value="Submit" ng-disabled="form-2.$invalid">
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-offset-1 col-md-3" data-ng-if="$state.current.data.template.fields.schema">
        <data-ng-include src="'/laravelerator/schema-notation'"></data-ng-include>
    </div>
</div>
