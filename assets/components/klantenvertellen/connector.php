<?php

/**
 * Klantenvertellen
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

require_once dirname(dirname(dirname(__DIR__))) . '/config.core.php';

require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';

$modx->getService('klantenvertellen', 'KlantenVertellen', $modx->getOption('klantenvertellen.core_path', null, $modx->getOption('core_path') . 'components/klantenvertellen/') . 'model/klantenvertellen/');

if ($modx->klantenvertellen instanceof KlantenVertellen) {
    $modx->request->handleRequest([
        'processors_path'   => $modx->klantenvertellen->config['processors_path'],
        'location'          => ''
    ]);
}
