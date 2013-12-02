<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TOKEN_CLASS_NAMESPACE</title>
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
	@yield('styles')
</head>
<body>
	<div class="container">
		@include('partials.navbar')
		@yield('content')
	</div>
	<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
	@yield('scripts')
</body>
</html>
