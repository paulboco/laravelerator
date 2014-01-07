/*
|--------------------------------------------------------------------------
| Template select
|--------------------------------------------------------------------------
*/

app.directive("templateSelect", function() {
    return {
        restrict: "E",
        controller: function($scope) {
            $scope.$watch('$state.current.data.form.template.basename', function(n) {
                if ( !n)
                    $scope.templateWarning = 'has-warning';
                else
                    $scope.templateWarning = '';
            });
        },
        template:   '<div class="form-group nullable" data-ng-class="templateWarning">' +
                    '<label for="template" class="control-label">* Template</label>' +
                    '<select data-ng-model="$state.current.data.form.template" data-ng-options="t.title for t in templates track by t.basename" name="template" class="form-control" required>' +
                    '<option value="">-- select template --</option>' +
                    '</select>' +
                    '</div>' +
                    '<div data-ng-if="$state.current.data.form.template">' +
                    '<data-ng-include src="\'/laravelerator/template-description\'">' +
                    '</data-ng-include>' +
                    '</div>'
    };
});

/*
|--------------------------------------------------------------------------
| Path input
|--------------------------------------------------------------------------
*/

app.directive("pathInput", function() {
    return {
        restrict: "E",
        controller: function($scope) {
            $scope.pathClass = function() {
                if ($scope.pathDisplay && $scope.pathDisplay.invalid)
                    return 'has-warning';
            };
        },
        template:   '<div class="form-group" data-ng-class="pathClass()">' +
                    '<label for="path" class="control-label">* Write Path</label>' +
                    '<input name="path" class="form-control" autofocus ' +
                        'data-ng-model="$state.current.data.form.path" ' +
                        'data-ng-change="fetch($state.current.data.form.path)" ' +
                        'data-ng-class="\'ng-invalid\'">' +
                    '</div>' +
                    '<div class="form-group path-display">' +
                    '<span id="path-status" ' +
                        'title="{{pathDisplay.basePath}}" ' +
                        'data-ng-class="pathClass()">' +
                        '{{pathDisplay.msg}}' +
                    '</span>' +
                    '</div>'
    };
});

/*
|--------------------------------------------------------------------------
| Table input
|--------------------------------------------------------------------------
*/

app.directive("tableInput", function() {
    return {
        restrict: "E",
        controller: function($scope) {
            $scope.$watch('$state.current.data.form.table', function(n) {
                if ( !n)
                    $scope.tableWarning = 'has-warning';
                else
                    $scope.tableWarning = '';
            });
        },
        template:   '<div class="form-group" ng-class="tableWarning">' +
                    '<label for="table" class="control-label">* Table Name</label>' +
                    '<input data-ng-model="$state.current.data.form.table" name="table" type="text" class="form-control" required>' +
                    '</div>'
    };
});

/*
|--------------------------------------------------------------------------
| Namespace input
|--------------------------------------------------------------------------
*/

app.directive("namespaceInput", function() {
    return {
        restrict: "E",
        controller: function($scope) {
            $scope.$watch('$state.current.data.form.namespace', function(n) {
                if ( !n)
                    $scope.namespaceWarning = 'has-warning';
                else
                    $scope.namespaceWarning = '';
            });
        },
        template: '<div ng-class="namespaceWarning" class="form-group">' +
                  '<label for="namespace" class="control-label">* Namespace</label>' +
                  '<input data-ng-model="$state.current.data.form.namespace" name="namespace" type="text" class="form-control" required>' +
                  '</div>'
    };
});

/*
|--------------------------------------------------------------------------
| Schema textarea
|--------------------------------------------------------------------------
*/

app.directive("schemaTextarea", function() {
    return {
        restrict: "E",
        controller: function($scope) {
            $scope.$watch('$state.current.data.form.schema', function(n) {
                if ( !n)
                    $scope.schemaWarning = 'has-warning';
                else
                    $scope.schemaWarning = '';
            });
        },
        template: '<div class="form-group" ng-class="schemaWarning">' +
                  '<label for="schema" class="control-label">* Schema</label>' +
                  '<textarea data-ng-model="$state.current.data.form.schema" name="schema" class="form-control" rows="5" required></textarea>' +
                  '</div>'
    };
});

/*
|--------------------------------------------------------------------------
| Mock button
|--------------------------------------------------------------------------
*/

app.directive("mockButton", function() {
    return {
        restrict: "E",
        require: "^state",
        controller:  function($state) {
            $state.current.data.mockClass = function() {
                if ($state.current.data.mock)
                    return 'toggle-on';
                else
                    return 'toggle-off';
            };
            $state.current.data.mockLabel = function() {
                return $state.current.data.mock && "Engaged" || "Disengaged";
            };
            $state.current.data.mockToggle = function() {
                $state.current.data.mock = !$state.current.data.mock;
                return $state.current.data.mock;
            };
        },
        template:   '<div class="form-group">' +
                    '<label for="mock" class="control-label">Mock</label>' +
                    '<a id="mock-button" class="form-control btn active" data-ng-class="$state.current.data.mockClass()" data-ng-click="$state.current.data.mockToggle()">{{$state.current.data.mockLabel()}}</a>' +
                    '<input type="hidden" name="mock" value="{{ $state.current.data.form.mock }}">'
    };
});

/*
|--------------------------------------------------------------------------
| Toggle button
|--------------------------------------------------------------------------
*/

app.directive("filterButton", function() {
    return {
        restrict: "E",
        require: "^state",
        controller:  function($state) {
            $state.current.data.filterClass = function() {
                if ($state.current.data.filter.value)
                {
                    $state.current.data.filter.string = 'laravelerator';
                    return 'toggle-on';
                }
                else
                {
                    $state.current.data.filter.string = '';
                    return 'toggle-off';
                }
            };
            $state.current.data.filterLabel = function() {
                return $state.current.data.filter.value && "Laravelerator Routes Omitted" || "Laravelerator Routes Included";
            };
            $state.current.data.filterToggle = function() {
                $state.current.data.filter.value = !$state.current.data.filter.value;
                return $state.current.data.filter.value;
            };
        },
        template: '<a id="filter-button" class="form-control btn" data-ng-class="$state.current.data.filterClass()" data-ng-click="$state.current.data.filterToggle()">{{$state.current.data.filterLabel()}}</a>'
    };
});
