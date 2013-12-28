
var myApp = angular.module('laravelerator', ['ui.router'])
    .run(['$rootScope', '$state', '$stateParams',
    function ($rootScope,   $state,   $stateParams) {
        // It's very handy to add references to $state and $stateParams to the $rootScope
        // so that you can access them from any scope within your applications.For example,
        // <li ng-class="{ active: $state.includes('contacts.list') }"> will set the <li>
        // to active whenever 'contacts.list' or one of its decendents is active.
        $rootScope.$state = $state;
        $rootScope.$stateParams = $stateParams;
}]);

myApp.config(function($stateProvider, $urlRouterProvider) {

    // For any unmatched url, redirect to /laravelerator/home
    $urlRouterProvider.otherwise("/laravelerator/home");

    // Now set up the states
    $stateProvider
        .state('home', {
            url: "/laravelerator/home",
            templateUrl: "/laravelerator/home",
            label: 'Home'
        })
        .state('generate', {
            url: "/laravelerator/generate",
            templateUrl: "/laravelerator/generate",
            label: 'Generate',
            controller: 'GenerateController',
            data: {
                path: 'app',
                table: 'problems',
                namespace: 'Shiphed',
                schema: "id : increments\nusername : string(100)\npassword : string(100)\n",
                mock: 'true'
            }
        })
        .state('routes', {
            url: "/laravelerator/routes",
            templateUrl: "/laravelerator/routes",
            label: 'Routes'
        });
});

myApp.controller('PageController', ['$scope', function($scope) {

    // Define navbar items
    $scope.items = [
        {title: 'Home', url: 'home'},
        {title: 'Generate', url: 'generate'},
        {title: 'Routes', url: 'routes'}
    ];

    $scope.$on('$stateChangeStart', function() {
        $scope.stateLoading = true;
    });

    $scope.$on('$stateChangeSuccess', function() {
        $scope.stateLoading = false;
    });
}]);

myApp.controller('GenerateController', ['$scope', '$http', function($scope, $http) {

    // Load the available templates
    var url = urlBase + 'ajax/templatesavailable';
    $http({
        method  : 'GET',
        params  : {'_token': csrfToken},
        url     : url
    })
    .success(function(templatesAvailable) {
        $scope.templatesAvailable = templatesAvailable;
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
