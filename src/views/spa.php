<!doctype html>
<html lang="en" data-ng-app="laravelerator">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-ng-bind="$state.current.data.title + ' - Angular States'">Angular States</title>
    <link rel="stylesheet" type="text/css" href="/laravelerator/assets/css?f=laravelerator-bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/laravelerator/assets/css?f=fonts.css">
    <link rel="stylesheet" type="text/css" href="/laravelerator/assets/css?f=laravelerator-style-dark.css">
    <script src="/laravelerator/assets/javascript?f=vendor/angular.js"></script>
    <script src="/laravelerator/assets/javascript?f=vendor/angular-sanitize.js"></script>
    <script src="/laravelerator/assets/javascript?f=vendor/ui-router.js"></script>
</head>
<body data-ng-controller="PageController">
    <data-ng-include src="'/laravelerator/nav'"></data-ng-include>
    <div class="container">
        <div data-ng-show="stateLoading" class="page-header">
            <h1><small>Loading ...</small></h1>
        </div>
        <div data-ng-hide="stateLoading">
            <div data-ui-view></div>
        </div>
    </div>
    <script src="/laravelerator/assets/javascript?f=states.js"></script>
    <script src="/laravelerator/assets/javascript?f=services.js"></script>
    <script src="/laravelerator/assets/javascript?f=directives.js"></script>
    <script src="/laravelerator/assets/javascript?f=controllers.js"></script>
    <script src="/laravelerator/assets/javascript?f=filters.js"></script>
    <script type="text/javascript">
        app.constant('LARAVEL', {
            token: '<?php echo Session::token() ?>',
            root: '<?php echo base_path() ?>'
        });
    </script>
</body>
</html>
