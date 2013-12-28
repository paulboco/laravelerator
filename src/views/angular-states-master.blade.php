<!doctype html>
<html lang="en" data-ng-app="laravelerator">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title ng-bind="$state.current.label + ' - Angular States'">Angular States</title>
    <link rel="stylesheet" type="text/css" href="/laravelerator/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/laravelerator/assets/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="/laravelerator/assets/css/style-dark.css">
</head>
<body ng-controller="PageController">
    @include('laravelerator::angular-states-nav')
    <div class="container">
        <div data-ng-show="stateLoading" class="page-header">
            <h1><small>Loading ...</small></h1>
        </div>
        <div data-ng-hide="stateLoading">
            <ui-view></ui-view>
        </div>
    </div>
    @section('scripts')
        <script type="text/javascript">
            var urlBase = '/laravelerator/';
            var csrfToken = '{{ Session::token() }}';
         </script>
        <script src="/laravelerator/assets/javascript/angular.js"></script>
        <script src="/laravelerator/assets/javascript/states.js"></script>
    @show
</body>
</html>
