<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ action('Laravelerator\Laravelerator\PagesController@home') }}">LARAVELERATOR</a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-left">
            <li class="dropdown {{ segment_is_active(2, 'receipts') }}">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Generate <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        {{ link_to_action('Laravelerator\Laravelerator\GenerateController@fromForm', 'From Form') }}
                    </li>
                    <li>
                        {{ link_to_action('Laravelerator\Laravelerator\GenerateController@fromTable', 'From Table') }}
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-left">
            <li><a href="{{ action('Laravelerator\Laravelerator\PagesController@routes') }}">Routes</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-left">
            <li>{{ HTML::link('problem', 'Problems') }}</li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="http://laravel.com/docs" target="_blank">Docs</a></li>
            <li><a href="/">{{ url('/') }}</a></li>
        </ul>
    </div>
</nav>