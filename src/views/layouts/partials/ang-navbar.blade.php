<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="navbar-header">
		<a class="navbar-brand" data-ng-click="loadPage('home')">LARAVELERATOR</a>
	</div>
	<ul class="nav navbar-nav navbar-left">
		<li><a href="{{ action('Laravelerator\Laravelerator\GenerateController@create') }}">Generate</a></li>
		<li><a href="{{ action('Laravelerator\Laravelerator\PagesController@routes') }}">Routes</a></li>
		<li>{{ HTML::link('problem', 'Problems') }}</li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href="http://laravel.com/docs" target="_blank">Docs</a></li>
		<li><a href="/">{{ url('/') }}</a></li>
	</ul>
</nav>