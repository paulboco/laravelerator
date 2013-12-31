/*
|--------------------------------------------------------------------------
| Templates select
|--------------------------------------------------------------------------
*/

app.directive("selectTemplate", function() {
    return {
        restrict: "E",
        require: "^state",
        controller:  function($state) {
            $state.current.data.templateClass = function() {
                if ($state.current.data.template === '')
                    return 'has-warning';
            };
        },

        template: '<div ng-class="$state.current.data.templateClass()" class="form-group">' +
                  '<label for="template" class="control-label">* Template</label>' +
                  '<select data-ng-model="$state.current.data.template" data-ng-options="t.title for t in templates track by t.basename" name="template" class="form-control">' +
                  '</select>' +
                  '</div>'
    };
});

/*
|--------------------------------------------------------------------------
| Path input
|--------------------------------------------------------------------------
*/

app.directive("inputPath", function() {
    return {
        restrict: "E",
        require: "^state",
        template: '<div class="form-group write-path">' +
                  '<label for="path" class="control-label">* Write Path</label>' +
                  '<input data-ng-model="$state.current.data.path" data-ng-change="fetch($state.current.data.path)" name="path" class="form-control">' +
                  '</div>' +
                  '<div class="form-group">' +
                  '<span id="path-status" class="{{pathDisplay.class}}">{{pathDisplay.realpath}}' +
                  '<br>{{pathDisplay.msg}}' +
                  '</span>' +
                  '</div>'
    };
});

/*
|--------------------------------------------------------------------------
| Table input
|--------------------------------------------------------------------------
*/

app.directive("inputTable", function() {
    return {
        restrict: "E",
        require: "^state",
        controller:  function($state) {
            $state.current.data.tableClass = function() {
                if ($state.current.data.table === '')
                    return 'has-warning';
            };
        },
        template: '<div ng-class="$state.current.data.tableClass()" class="form-group">' +
                  '<label for="table" class="control-label">* Table Name</label>' +
                  '<input data-ng-model="$state.current.data.table" name="table" type="text" class="form-control">' +
                  '</div>'
    };
});

/*
|--------------------------------------------------------------------------
| Namespace input
|--------------------------------------------------------------------------
*/

app.directive("inputNamespace", function() {
    return {
        restrict: "E",
        require: "^state",
        controller:  function($state) {
            $state.current.data.namespaceClass = function() {
                if ($state.current.data.namespace === '')
                    return 'has-warning';
            };
        },
        template: '<div ng-class="$state.current.data.namespaceClass()" class="form-group">' +
                  '<label for="namespace" class="control-label">* Namespace</label>' +
                  '<input data-ng-model="$state.current.data.namespace" name="namespace" type="text" class="form-control">' +
                  '</div>'
    };
});

/*
|--------------------------------------------------------------------------
| Schema input
|--------------------------------------------------------------------------
*/

app.directive("inputSchema", function() {
    return {
        restrict: "E",
        require: "^state",
        controller:  function($state) {
            $state.current.data.schemaClass = function() {
                if ($state.current.data.schema === '')
                    return 'has-warning';
            };
        },
        template: '<div ng-class="$state.current.data.schemaClass()" class="form-group">' +
                  '<label for="schema" class="control-label">* Schema</label>' +
                  '<textarea data-ng-model="$state.current.data.schema" name="schema" class="form-control" rows="5"></textarea>' +
                  '</div>'
    };
});

/*
|--------------------------------------------------------------------------
| Mock button
|--------------------------------------------------------------------------
*/

app.directive("buttonMock", function() {
    return {
        restrict: "E",
        require: "^state",
        controller:  function($state) {
            $state.current.data.mockClass = function() {
                if ($state.current.data.mock)
                    return 'active';
            };
        },
        template: '<div class="form-group">' +
                  '<label for="mock" class="control-label">Mock</label>' +
                  '<a id="mock-button" class="form-control btn" data-ng-class="$state.current.data.mockClass" data-ng-click="$state.current.data.mock = !$state.current.data.mock">{{$state.current.data.mock && "Engaged" || "Disengaged"}}</a>' +
                  '<input type="hidden" name="mock" value="{{ $state.current.data.mock }}">'
    };
});
