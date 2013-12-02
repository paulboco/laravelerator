<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ action('Laravelerator\Laravelerator\PagesController@home') }}">LARAVELERATOR</a>
	</div>

	<div class="collapse navbar-collapse">
		<ul class="nav navbar-nav navbar-left">
			<li><a href="{{ action('Laravelerator\Laravelerator\BoilerplateController@create') }}">Boilerplate</a></li>
			<li><a href="{{ action('Laravelerator\Laravelerator\ResourceController@create') }}">Resource</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="{{ url('/') }}">Home</a></li>
		</ul>
	</div>
</nav>