/*
|--------------------------------------------------------------------------
| Laravelerator Module
|--------------------------------------------------------------------------
*/

var app = angular.module('laravelerator', ['ui.router', 'ngSanitize'])
    .run(['$rootScope', '$state', '$stateParams',
    function ($rootScope,   $state,   $stateParams) {
        // It's very handy to add references to $state and $stateParams to the $rootScope
        // so that you can access them from any scope within your applications.For example,
        // <li ng-class="{ active: $state.includes('contacts.list') }"> will set the <li>
        // to active whenever 'contacts.list' or one of its decendents is active.
        $rootScope.$state = $state;
        $rootScope.$stateParams = $stateParams;
}]);

/*
|--------------------------------------------------------------------------
| Configuration
|--------------------------------------------------------------------------
*/

app.config(function($stateProvider, $urlRouterProvider) {

    // For any unmatched url, redirect to /laravelerator/home
    $urlRouterProvider.otherwise('/laravelerator/home');

    // Now set up the states
    $stateProvider
        .state('home', {
            url: '/laravelerator/home',
            templateUrl: '/laravelerator/home',
            data: {
                title: 'Home'
            }
        })
        .state('generate', {
            url: '/laravelerator/generate',
            templateUrl: '/laravelerator/generate',
            controller: 'GenerateController',
            resolve:{
                templatesService: 'templatesService',
                pathDisplayService: 'pathDisplayService',
                schemaService: 'schemaService'
            },
            data: {
                title: 'Generate',
                template: '',
                path: 'app',
                table: '',
                namespace: '',
                schema: '',
                mock: true
            },
        })
        .state('routes', {
            url: '/laravelerator/routes',
            templateUrl: '/laravelerator/routes',
            controller: 'RoutesController',
            resolve:{
                routesService: 'routesService'
            },
            data: {
                title: 'Routes',
                filter: {
                    value: true,
                    string: 'laravelerator'
                }
            }
        });
});
