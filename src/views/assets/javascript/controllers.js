// Instantiate app
var laraveleratorApp = angular.module('laravelerator', []).

// headController
controller('headController', ['$scope', 'Data', function($scope, Data) {
    $scope.data = Data;
}]).

// pagesController
controller('pagesController', ['$scope', '$http', 'Data', function ($scope, $http, Data) {
    $scope.template = '';
    $scope.data = Data;

    var urlBase = '/angular/';
    $scope.pages = [
        { title: 'Home', url: urlBase + 'home', cache: true },
        { title: 'Routes', url: urlBase + 'routes', cache: true },
        { title: 'Domain Root', url: '/', cache: false, href: '/index.php' },
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
}]).

// navbarController
controller('navbarController', ['$scope', 'Data', function ($scope, Data) {
    $scope.isActive = function(url) {
        if (Data.currentUrl) {
            return url == Data.currentUrl;
        }
    };
}]);
