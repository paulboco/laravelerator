<style>
	@import url(http://fonts.googleapis.com/css?family=Nosifer|Source+Code+Pro:400|Audiowide);

	body {
		margin-top: 40px;
	}

	h1, h2, h3, h4, .navbar-brand {
		font-family: 'Audiowide', monospace;
	}

	pre {
		padding: 15px;
		background-color: #f7f7f7;
		border-color: #ddd;
		font-family: 'Source Code Pro', monospace;
		line-height: 1.9em;
		color: #000;
	}

	a.navbar-brand {
		font-size: 1.5em !important;
		font-weight: bold;
		color: lime !important;
	}

	div#path-status  {
		margin-top: -10px;
		margin-bottom: 30px;
		/*font-family: 'Ubuntu Mono', monospace;*/
	}

	div#path-status span.found {
		color: green;
	}

	div#path-status span.not-found {
		color: silver;
	}

	div#path-status span.found-outside-root {
		color: red;
	}

	pre#command {
		cursor: pointer;
	}

	pre.file-path {
		margin: 20px 0 0;
		background-color: transparent;
		border: none;
	}

	span.help-block {
		word-wrap: break-word;
	}

</style>
