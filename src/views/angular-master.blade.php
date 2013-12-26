<!doctype html>
<html lang="en" ng-app="laravelerator">
<head ng-controller="headController">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravelerator @{{ data.subTitle }}</title>
    <link rel="stylesheet" type="text/css" href="/laravelerator/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/laravelerator/assets/css/style-dark.css">
    <link rel="stylesheet" type="text/css" href="/laravelerator/assets/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="/laravelerator/assets/css/prettyprint-dark.css">
    @section('styles')
    @show
</head>

<body ng-controller="pagesController">
    @include('laravelerator::angular-nav')
    <div class="container">
        <div class="loading" ng-hide="loaded">
            Loading ...
        </div>
        <ng-include ng-show="loaded" src="template"></ng-include>
    </div>
    @section('scripts')
        <script src="/laravelerator/assets/javascript/angular.js"></script>
        <script src="/laravelerator/assets/javascript/controllers.js"></script>
        <script src="/laravelerator/assets/javascript/services.js"></script>
        <script src="/laravelerator/assets/javascript/prettify.js"></script>
    @show
</body>
</html>
