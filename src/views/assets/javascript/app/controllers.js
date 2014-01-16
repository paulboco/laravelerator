/*
|--------------------------------------------------------------------------
| Page controller
|--------------------------------------------------------------------------
*/

app.controller('PageController', ['$scope', function($scope) {

    // Define navbar items
    $scope.navItems = [
        {label: 'Home', url: 'home'},
        {label: 'Generate', url: 'generate'},
        {label: 'Routes', url: 'routes'}
    ];

    $scope.$on('$stateChangeStart', function() {
        $scope.stateLoading = true;
    });

    $scope.$on('$stateChangeSuccess', function() {
        $scope.stateLoading = false;
    });
}]);

/*
|--------------------------------------------------------------------------
| Generate controller
|--------------------------------------------------------------------------
*/

app.controller('GenerateController',
    ['$scope', '$state', 'LARAVEL', 'templateService', 'pathService', 'schemaService', 'generateService',
    function($scope, $state, LARAVEL, templateService, pathService, schemaService, generateService) {

    // set the csrf token
    $scope.token = LARAVEL.token;

    // Submit the form
    $scope.submit = function() {
console.log($state.$current.data.form);
        $state.go('generate.store');
        // generateService.create($state.$current.data.form);
// console.log($state.$current.data.form);
        alert('here');
    };

    // Get available templates
    templateService.all().then(function(data) {
        $state.$current.data.templates = data;
    });

    // Get path display
    $scope.fetch = function(path) {
        pathService.get(path).then(function(pathDisplay) {
            $scope.pathDisplay = pathDisplay;
        });
    };

    // Get schema notation
    $scope.getSchema = function() {
        schemaService.all().then(function(schema) {
            $scope.schema = schema;
        });
    };

    // Load the schema notation only when required
    $scope.$on('$includeContentRequested', function(event, data) {
        if ($scope.form.template.$modelValue.fields.schema)
            $scope.getSchema();
    });

    if (typeof $scope.$state.current.data.form !== 'undefined')
        $scope.fetch($scope.$state.current.data.form.path);
}]);

/*
|--------------------------------------------------------------------------
| Routes controller
|--------------------------------------------------------------------------
*/

app.controller('RoutesController', ['$scope', '$http', 'routesService', function($scope, $http, routesService) {

    // Get registered routes
    routesService.all().then(function(routes) {
        $scope.routes = routes;
    });
}]);
