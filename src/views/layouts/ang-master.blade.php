<!doctype html ng-app="laravelerator">
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravelerator @yield('subTitle')</title>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
    @include('laravelerator::assets.css.style-dark')
    @include('laravelerator::assets.css.prettyprint-dark')
    <link href="//fonts.googleapis.com/css?family=Source+Code+Pro:400|Audiowide" rel="stylesheet">
</head>

<body>
    @include('laravelerator::layouts.partials.ang-navbar')
    <div class="container">
        @yield('content')
    </div>
    @section('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.5/angular.min.js"></script>
        <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
    @show

<script>
    var laravelerator = angular.module('laravelerator', []);

    laravelerator.config(function ($routeProvider) {
        $routeProvider
            .when('/',
                {
                    controller: 'SimpleController',
                    templateUrl: urlBase + '7. Partial1.html'
                })
            //Define a route that has a route parameter in it (:customerID)
            .when('/partial2',
                {
                    controller: 'SimpleController',
                    templateUrl: urlBase + '7. Partial2.html'
                })
            .otherwise({ redirectTo: '/partial1' });
    });

    laravelerator.controller('SimpleController', function ($scope) {
        $scope.customers = [
            { name: 'Dave Jones', city: 'Phoenix' },
            { name: 'Jamie Riley', city: 'Atlanta' },
            { name: 'Heedy Wahlin', city: 'Chandler' },
            { name: 'Thomas Winter', city: 'Seattle' }
        ];
    });
</script>

</body>
</html>
