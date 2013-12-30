/**
 * Page Controller
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

/**
 * Generate Controller
 */
app.controller(
    'GenerateController',
    ['$scope', 'templatesService', 'pathDisplayService', 'schemaService',
    function($scope, templatesService, pathDisplayService, schemaService) {

    // Get available templates
    templatesService.all().then(function(templates) {
        $scope.templates = templates;
    });

    // Get path display
    $scope.fetch = function(path) {
        pathDisplayService.get(path).then(function(pathDisplay) {
            $scope.pathDisplay = pathDisplay;
        });
    };

    // Get schema notation
    schemaService.all().then(function(schema) {
        $scope.schema = schema;
    });

    $scope.fetch($scope.$state.current.data.path);
}]);

/**
 * Routes Controller
 */
app.controller('RoutesController', ['$scope', '$http', 'routesService', function($scope, $http, routesService) {

    // Get registered routes
    routesService.all().then(function(routes) {
        $scope.routes = routes;
    });
}]);
