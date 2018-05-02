<?php
	
    /**
     * Klantenvertellen
     *
     * Copyright 2018 by Oene Tjeerd de Bruin <modx@oetzie.nl>
     */
    
    $modx->getService('kvReviewsSnippet', 'KvReviewsSnippet', $modx->getOption('kv.core_path', null, $modx->getOption('core_path') . 'components/kv/') . 'model/kv/');
    
    if ($modx->kvReviewsSnippet instanceof KvReviewsSnippet) {
        return $modx->kvReviewsSnippet->run($scriptProperties);
    }
    
    return ' ';
	
?>