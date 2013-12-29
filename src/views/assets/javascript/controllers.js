// Page Controller
app.controller('PageController', ['$scope', function($scope) {

    // Define navbar items
    $scope.items = [
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

// Generate Controller
app.controller('GenerateController', ['$scope', '$http', 'ajaxService', function($scope, $http, ajaxService) {
    ajaxService.getTemplates().then(function(d) {
        $scope.templatesAvailable = d;
    });

    // Fetch write path info
    $scope.fetch = function(path) {
        var url = urlBase + 'ajax/path';
        $http({
            method  : 'GET',
            params  : {'_token': csrfToken, 'path': path},
            url     : url
        })
        .success(function(data) {
            $scope.pathDisplay = data;
        });
    };

    $scope.fetch($scope.$state.current.data.path);
}]);
