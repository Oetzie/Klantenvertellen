<?php
	
	return array(
	    array(
	        'name' 		=> 'limit',
	        'desc' 		=> 'kvreviews_snippet_limit_desc',
	        'type' 		=> 'textfield',
	        'options' 	=> '',
	        'value'		=> '10',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'sort',
	        'desc' 		=> 'kvreviews_snippet_sort_desc',
	        'type' 		=> 'textfield',
	        'options' 	=> '',
	        'value'		=> '{"created": "DESC"}',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    )
	);

?>