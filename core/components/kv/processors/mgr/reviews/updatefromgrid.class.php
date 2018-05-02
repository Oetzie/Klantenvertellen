<?php

    /**
     * Klantenvertellen
     *
     * Copyright 2018 by Oene Tjeerd de Bruin <modx@oetzie.nl>
     */
    
    require_once __DIR__ . '/update.class.php';
    
    class KvReviewsUpdateFromGridProcessor extends KvReviewsUpdateProcessor {
        /**
         * @acces public.
         * @return Mixed.
         */
        public function initialize() {
            $data = $this->getProperty('data');
            
            if (empty($data)) {
                return $this->modx->lexicon('invalid_data');
            }
            
            $data = $this->modx->fromJSON($data);
            
            if (empty($data)) {
                return $this->modx->lexicon('invalid_data');
            }
            
            $this->setProperties($data);
            
            $this->unsetProperty('data');
            
            return parent::initialize();
        }
    }
    
    return 'KvReviewsUpdateFromGridProcessor';
	
?>