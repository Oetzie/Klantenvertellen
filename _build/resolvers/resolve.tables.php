<?php

/**
 * Klantenvertellen
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

if ($object->xpdo) {
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
            $modx =& $object->xpdo;
            $modx->addPackage('klantenvertellen', $modx->getOption('klantenvertellen.core_path', null, $modx->getOption('core_path') . 'components/klantenvertellen/') . 'model/');

            $manager = $modx->getManager();

            $manager->createObjectContainer('KlantenVertellenReview');

            break;
    }
}

return true;