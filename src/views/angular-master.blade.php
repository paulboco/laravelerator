<!doctype html>
<html lang="en" data-ng-app="laravelerator">
<head data-ng-controller="HeadController">
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

<body data-ng-controller="PagesController">
    @include('laravelerator::angular-nav')
    <div class="container">
        <div class="loading  page-header" data-ng-hide="loaded">
            <h1><small>Loading ...</small></h1>
        </div>
        <data-ng-include data-ng-show="loaded" src="template"></data-ng-include>
    </div>
    @section('scripts')
        <script type="text/javascript">
            var urlBase = '/laravelerator/';
            var csrfToken = '{{ Session::token() }}';
         </script>
        <script src="/laravelerator/assets/javascript/angular.js"></script>
        <script src="/laravelerator/assets/javascript/controllers.js"></script>
        <script src="/laravelerator/assets/javascript/services.js"></script>
        <script src="/laravelerator/assets/javascript/prettify.js"></script>
    @show
</body>
</html>
