<?php
	
    /**
     * Klantenvertellen
     *
     * Copyright 2018 by Oene Tjeerd de Bruin <modx@oetzie.nl>
     */
    
    require_once dirname(dirname(dirname(dirname(__DIR__)))) . '/config.core.php';
    
    require_once MODX_CORE_PATH . 'model/modx/modx.class.php';
    
    $modx = new modX();
    $modx->initialize('web');
    
    $modx->getService('error', 'error.modError');
    $modx->setLogLevel(modX::LOG_LEVEL_INFO);
    $modx->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'HTML');
    
    /*
     * Put the options in the $options variable.
     * We use getopt for CLI executions and $_GET for http executions.
     */
    $options = [];
    
    if (XPDO_CLI_MODE) {
        $options = getopt('', ['debug']);
    } else {
        $options = $_GET;
    }
    
    $modx->getService('kvCronjob', 'KvCronjob', $modx->getOption('kv.core_path', null, $modx->getOption('core_path').'components/kv/') . 'model/kv/');
    
    if ($modx->kvCronjob instanceof KvCronjob) {
        if (isset($options['debug'])) {
            $modx->kvCronjob->setDebugMode(true);
        }
        
        $modx->kvCronjob->run();
    } else {
        $modx->log(modX::LOG_LEVEL_INFO, 'ERROR:: Cannot initialize service.');
    }
		
?>