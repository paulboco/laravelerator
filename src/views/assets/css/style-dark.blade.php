<style>
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
	button#mock-button.active,
	.form-control,
	.panel,
	.list-group-item,
	h1.success,
	div.navbar-header a.navbar-brand:hover,
	div.navbar-collapse ul.navbar-nav li a:hover,
	div#path-status span.path-found,
	div.directories,
	.popover,
	.directories pre,
	.table > tbody > tr > td {
		color: lime !important;
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

	h1 small, h2 small, h3 small, th {
		color: #888;
	}

	h1, h2, h3, h4, h5, .navbar-brand, .popover, th {
		font-family: 'Audiowide', monospace;
	}

	pre,
	input#compiled-command,
	div.directories,
	.popover-content,
	.table > tbody > tr > td {
		font-size: 1.05em;
		font-family: 'Source Code Pro', monospace;
	}

	table,
	table tr,
	table td,
	div.panel-heading.file-path,
	input.form-control,
	select.form-control,
	textarea.form-control,
	button.form-control,
	input.btn,
	.panel,
	.list-group-item,
	div.directories,
	.directories pre,
	.overwrites pre {
		background-color: #404040 !important;
		border-color: #555 !important;
		border-radius: 4px;
	}

	div.hr {
		margin: 80px auto 60px;
		padding: .5px;
		background-color: lime;
		border: solid 2px green;
	}

	.panel-body {
		border:	0 !important;
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

	.panel-heading.directories {
		cursor: pointer;
	}

	div.panel-heading.directories:hover {
		background-color: #383838 !important;
	}

	pre {
		padding: 15px;
		background-color: #f7f7f7;
		border-color: #ddd;
		line-height: 2.5em;
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

	span.mute-basepath,
	div#path-status span.path-not-found {
		color: gray;
	}

	input#compiled-command {
		cursor: pointer;
		height: 50px;
		padding-left: 15px;
	}

	span.help-block {
		word-wrap: break-word;
	}

	tbody.no-wrap > tr > td {
		white-space: nowrap;
	}

	.table > thead > tr > th {
		border: 0;
	}

</style>
