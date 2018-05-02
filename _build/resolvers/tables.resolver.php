<?php

    $action = $options[xPDOTransport::PACKAGE_ACTION];
    
    if ($object->xpdo) {
        switch ($action) {
            case xPDOTransport::ACTION_INSTALL:
                $modx =& $object->xpdo;
                $modx->addPackage('kv', $modx->getOption('kv.core_path', null, $modx->getOption('core_path') . 'components/kv/') . 'model/');
    
                $manager = $modx->getManager();
    
                $manager->createObjectContainer('KvReview');
    
                break;
        }
    }
    
    return true;

?>