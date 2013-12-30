/**
 * Laravelerator Module
 */
var app = angular.module('laravelerator', ['ui.router'])
    .run(['$rootScope', '$state', '$stateParams',
    function ($rootScope,   $state,   $stateParams) {
        // It's very handy to add references to $state and $stateParams to the $rootScope
        // so that you can access them from any scope within your applications.For example,
        // <li ng-class="{ active: $state.includes('contacts.list') }"> will set the <li>
        // to active whenever 'contacts.list' or one of its decendents is active.
        $rootScope.$state = $state;
        $rootScope.$stateParams = $stateParams;
}]);

/**
 * Configuration
 */
app.config(function($stateProvider, $urlRouterProvider, laravel) {

    // For any unmatched url, redirect to /laravelerator/home
    $urlRouterProvider.otherwise(laravel.urlBase + 'home');

    // Now set up the states
    $stateProvider
        .state('home', {
            url: laravel.urlBase + 'home',
            templateUrl: laravel.urlBase + 'home',
            data: {
                title: 'Home'
            }
        })
        .state('generate', {
            url: laravel.urlBase + 'generate',
            templateUrl: laravel.urlBase + 'generate',
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
                table: 'problems',
                namespace: 'Shiphed',
                schema: "id : increments\nusername : string(100)\npassword : string(100)\n",
                mock: 'true'
            },
        })
        .state('routes', {
            url: laravel.urlBase + 'routes',
            templateUrl: laravel.urlBase + 'routes',
            controller: 'RoutesController',
            resolve:{
                routesService: 'routesService'
            },
            data: {
                title: 'Routes'
            }
        });
});
