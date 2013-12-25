// Instantiate app
var laraveleratorApp = angular.module('laravelerator', []);

// headController
laraveleratorApp.controller('headController', function($scope, Data) {
    $scope.data = Data;
});

// pagesController
laraveleratorApp.controller('pagesController', function ($scope, $http, Data) {
    $scope.template = '';
    $scope.html = '';
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
        $scope.loadingClass = 'show';
        $scope.template = page.url;
        $http({ method: 'GET', url: page.url, cache: page.cache})
          .success(function (html) {
              $scope.html = html;
              $scope.data.subTitle = '- ' + page.title;
              $scope.data.currentUrl = page.url;
              $scope.loaded = true;
              $scope.loadingClass = 'hide';
          })
          .error(function (html, status) {
              $scope.html = 'Unable to load view: ' + status;
          });
    }

    // Load home page on start
    $scope.loadPage($scope.pages[0]);
});

// navbarController
laraveleratorApp.controller('navbarController', function ($scope, Data) {
    $scope.isActive = function(url) {
        if (Data.currentUrl) {
            return url == Data.currentUrl;
        }
    }
});
