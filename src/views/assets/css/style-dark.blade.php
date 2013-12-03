<style>
	@import url(http://fonts.googleapis.com/css?family=Source+Code+Pro:400|Audiowide);

	html {
		min-height: 101%;
	}

	body {
		margin-top: 40px;
		background-color: #4e4e4e;
	}

	::selection {
		background: RoyalBlue;
		color: white;
	}

	em,
	input.btn-default:hover,
	pre.file-path,
	.form-control,
	.panel,
	.list-group-item,
	h1.success,
	div.navbar-header a.navbar-brand:hover,
	div.navbar-collapse ul.navbar-nav li a:hover,
	.popover,
	.directories pre {
		color: lime;
	}

	h1.error,
	span.help-block,
	div.has-error label.control-label,
	div#path-status span.path-outside-root,
	.overwrites pre,
	button#mock-button {
		color: Gold !important;
	}

	h1, h2, h3, h4, h5, label,
	input.btn-default
	{
		color: #bbb;
	}

	h1 small, h2 small, h3 small {
		color: #888;
	}

	h1, h2, h3, h4, h5, .navbar-brand, .popover {
		font-family: 'Audiowide', monospace;
	}

	pre, .popover-content, input#command {
		font-family: 'Source Code Pro', monospace;
	}

	input.form-control,
	select.form-control,
	textarea.form-control,
	button.form-control,
	input.btn,
	.panel,
	.list-group-item,
	.directories pre,
	.overwrites pre {
		background-color: #404040 !important;
		border-color: #555 !important;
	}

	button#mock-button.active {
		color: lime !important;
	}

	div.hr {
		margin: 80px auto 60px;
		padding: .5px;
		background-color: lime;
		border: solid 2px green;
	}

	.popover, .popover-title {
		background-color: #3f3f3f !important;
		border-color: #888 !important;
	}

	.popover.left {
		box-shadow: 0px 0px 30px 10px rgba(100, 100, 100, .5);
	}

	.popover.left .arrow:after {
		border-left-color: lime !important;
	}

	pre {
		padding: 15px;
		background-color: #f7f7f7;
		border-color: #ddd;
		line-height: 2.5em;
		font-size: 1.05em;
		color: #000;
	}

	.form-control:focus {
		border-color: lime !important;
		box-shadow: inset 0 1px 1px rgba(0,0,0,0.075),0 0 8px rgba(0,255,75,0.6)
	}

	a.navbar-brand {
		font-size: 1.5em !important;
		font-weight: bold;
	}

	div.page-header {
		border-bottom-color: #444;
	}

	div#path-status  {
		margin-top: -10px;
		margin-bottom: 30px;
	}

	div#path-status span.path-found {
		color: lime;
	}

	div#path-status span.path-not-found {
		color: gray;
	}

	input#command {
		cursor: pointer;
		height: 50px;
		padding-left: 15px;
		font-size: 1.05em;
	}

	pre.file-path {
		margin: 20px 0 0;
		background-color: transparent;
		border: none;
	}

	span.help-block {
		word-wrap: break-word;
	}

	span.mute-path {
		color: gray;
	}

</style>