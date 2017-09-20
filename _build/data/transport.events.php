<?php

	$events = array();

	$events[0] = $modx->newObject('modEvent');
	$events[0]->fromArray(array(
		'name' 		=> 'onKvUpdate',
		'service' 	=> '6',
		'groupname' => 'Custom'
	), '', true, true);
		
	return $events;
	
?>