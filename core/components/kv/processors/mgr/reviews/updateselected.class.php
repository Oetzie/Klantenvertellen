<?php

    /**
     * Klantenvertellen
     *
     * Copyright 2018 by Oene Tjeerd de Bruin <modx@oetzie.nl>
     */
    
    class KvReviewsUpdateSelectedProcessor extends modProcessor {
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
        public function process() {
            $this->modx->cacheManager->refresh([
                'kvreviews' => []
            ]);
            
            foreach (explode(',', $this->getProperty('ids')) as $key => $value) {
                if (false !== ($object = $this->modx->getObject($this->classKey, $value))) {
                    $object->fromArray([
                        'active' => $this->getProperty('type')
                    ]);
                    
                    $object->save();
                }
            }
        
            $this->modx->invokeEvent('onKvUpdate');
            
            return $this->outputArray([]);
        }
    }
    
    return 'KvReviewsUpdateSelectedProcessor';
	
?>