<?php

	if ($object->xpdo) {
	    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
	        case xPDOTransport::ACTION_INSTALL:
	            $modx =& $object->xpdo;
	            $modx->addPackage('kv', $modx->getOption('kv.core_path', null, $modx->getOption('core_path').'components/kv/').'model/');
	
	            $manager = $modx->getManager();
	
	            $manager->createObjectContainer('KvReviews');
	
	            break;
	        case xPDOTransport::ACTION_UPGRADE:
	            break;
	    }
	}
	
	return true;

?>