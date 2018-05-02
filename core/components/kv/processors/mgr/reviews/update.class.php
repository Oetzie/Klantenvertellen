<?php

    /**
     * Klantenvertellen
     *
     * Copyright 2018 by Oene Tjeerd de Bruin <modx@oetzie.nl>
     */
    
    class KvReviewsUpdateProcessor extends modObjectUpdateProcessor {
        /**
         * @access public.
         * @var String.
         */
        public $classKey = 'KvReview';
        
        /**
         * @access public.
         * @var Array.
         */
        public $languageTopics = ['kv:default'];
        
        /**
         * @access public.
         * @var String.
         */
        public $objectType = 'kv.review';
    
        /**
         * @acces public.
         * @return Mixed.
         */
        public function initialize() {
            $this->modx->getService('kv', 'Reviews', $this->modx->getOption('kv.core_path', null, $this->modx->getOption('core_path') . 'components/kv/') . 'model/kv/');
            
            return parent::initialize();
        }
    
        /**
         * @access public.
         * @return Mixed.
         */
        public function afterSave() {
            $this->modx->cacheManager->refresh([
                'kvreviews' => []
            ]);
            
            $this->modx->invokeEvent('onKvUpdate');
            
            return parent::afterSave();
        }
    }
    
    return 'KvReviewsUpdateProcessor';
	
?>