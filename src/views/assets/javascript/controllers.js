// Instantiate app
var laraveleratorApp = angular.module('laravelerator', [])

// HeadController
.controller('HeadController', ['$scope', 'Data', function($scope, Data) {
    $scope.data = Data;
}])

// PagesController
.controller('PagesController', ['$scope', '$http', 'Data', '$timeout', function ($scope, $http, Data, $timeout) {
    $scope.template = '';
    $scope.data = Data;

    $scope.pages = [
        { title: 'Home', url: urlBase + 'home', cache: true },
        { title: 'Generate', url: urlBase + 'generate/create', cache: false },
        { title: 'Routes', url: urlBase + 'routes', cache: true },
        { title: 'Domain Root', url: '/', cache: false },
    ];

    // make this a service
    $scope.loadPage = function (page) {
        $scope.loaded = false;
        $scope.data.subTitle = '- ' + page.title;
        $scope.data.currentUrl = page.url;
        $scope.template = page.url;
        $http({ method: 'GET', url: page.url, cache: page.cache})
            .success(function (html) {
                $scope.loaded = true;
            })
            .error(function (html, status) {
                $scope.html = 'Unable to load view: ' + status;
            });
    };

    // Load home page on start
    $scope.loadPage($scope.pages[0]);
}])

// NavbarController
.controller('NavbarController', ['$scope', 'Data', function ($scope, Data) {
    $scope.isActive = function(url) {
        if (Data.currentUrl) {
            return url == Data.currentUrl;
        }
    };
}]);

function GenerateController($scope, $http) {

    // init
    $scope.mock = 'true';

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
    $scope.fetch = function() {
        var url = urlBase + 'ajax/path';
        $http({
            method  : 'GET',
            params  : {'_token': csrfToken, 'path': $scope.path},
            url     : url
        })
        .success(function(data) {
            $scope.pathDisplay = data;
        });
    };

    $scope.fetch();
}
