<!doctype html>
<html>
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
        @include('laravelerator::layouts.partials.navbar')
        <div class="container">
            @yield('content')
        </div>
        <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
        <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
        @yield('scripts')
    </body>
</html>
