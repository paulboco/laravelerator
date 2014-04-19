<style>

	/* Pretty Print */
	li.L0, li.L1, li.L2, li.L3,
	li.L5, li.L6, li.L7, li.L8
	{ list-style-type: decimal !important }


	/* SPAN elements with the classes below are added by prettyprint. */
	.pln { color: #000 }  /* plain text */
	pre.prettyprint {
	    tab-size: 4;
		padding: 15px !important;
		border-color: transparent !important;
		line-height: 2em;
	}

	@media screen {
		pre.prettyprint { display: block; background-color: #404040 }
		pre .nocode { background-color: none; color: #000 }
		pre .str { color: #ffa0a0 } /* string  - pink */
		pre .kwd { color: #f0e68c }
		pre .com { color: #87ceeb } /* comment - skyblue */
		pre .typ { color: #98fb98 } /* type    - lightgreen */
		pre .lit { color: #cd5c5c } /* literal - darkred */
		pre .pun { color: #fff }    /* punctuation */
		pre .pln { color: #fff }    /* plaintext */
		pre .tag { color: #f0e68c } /* html/xml tag    - lightyellow */
		pre .atn { color: #bdb76b } /* attribute name  - khaki */
		pre .atv { color: #ffa0a0 } /* attribute value - pink */
		pre .dec { color: #98fb98 } /* decimal         - lightgreen */
		pre .fun { color: red }     /* a function name */
	}

	/* Use higher contrast and text-weight for printable form. */
	@media print, projection {
		.str { color: #060 }
		.kwd { color: #006; font-weight: bold }
		.com { color: #600; font-style: italic }
		.typ { color: #404; font-weight: bold }
		.lit { color: #044 }
		.pun, .opn, .clo { color: #440 }
		.tag { color: #006; font-weight: bold }
		.atn { color: #404 }
		.atv { color: #060 }
	}

	/* Put a border around prettyprinted code snippets. */
	/*pre.prettyprint { padding: 2px; border: 1px solid #888 }*/

	/* Specify class=linenums on a pre to get line numbering */
	ol.linenums { margin-top: 0; margin-bottom: 0; color: #777; } /* IE indents via margin-left */
	li.L0,
	li.L1,
	li.L2,
	li.L3,
	li.L5,
	li.L6,
	li.L7,
	li.L8 { list-style-type: none }
	/* Alternate shading for lines */
	li.L1,
	li.L3,
	li.L5,
	li.L7,
	li.L9 { background: #404040 !important; }
</style>