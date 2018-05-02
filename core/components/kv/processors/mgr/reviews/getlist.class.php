<?php

    /**
     * Klantenvertellen
     *
     * Copyright 2018 by Oene Tjeerd de Bruin <modx@oetzie.nl>
     */
    
    class KvReviewsGetListProcessor extends modObjectGetListProcessor {
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
        public $defaultSortField = 'created';
        
        /**
         * @access public.
         * @var String.
         */
        public $defaultSortDirection = 'DESC';
        
        /**
         * @access public.
         * @var String.
         */
        public $objectType = 'kv.review';
            
        /**
         * @access public.
         * @return Mixed.
         */
        public function initialize() {
        $this->modx->getService('kv', 'Reviews', $this->modx->getOption('kv.core_path', null, $this->modx->getOption('core_path') . 'components/kv/') . 'model/kv/');
        
            $this->setDefaultProperties([
                'dateFormat' => $this->modx->getOption('manager_date_format') . ', ' . $this->modx->getOption('manager_time_format')
            ]);
            
            return parent::initialize();
        }
        
        /**
         * @access public.
         * @param Object $c.
         * @return Object.
         */
        public function prepareQueryBeforeCount(xPDOQuery $c) {
            $c->select($this->modx->getSelectColumns('KvReview', 'KvReview'));
            $c->select('ROUND(((service + expertise + price) / 3), 1) AS average');
            
            $status = $this->getProperty('status');
            
            if ('' != $status) {
                $c->where([
                    'active' => $status
                ]);
            }
            
            $query = $this->getProperty('query');
            
            if (!empty($query)) {
                $c->where([
                    'name:LIKE'         => '%' . $query . '%',
                    'OR:city:LIKE'      => '%' . $query . '%',
                    'OR:content:LIKE'   => '%' . $query . '%'
                ]);
            }

            return $c;
        }
        
        /**
         * @access public.
         * @param Object $object.
         * @return Array.
         */
        public function prepareRow(xPDOObject $object) {
            $array = array_merge($object->toArray(), [
                'avarage_stars' => round((float) $object->get('average')) / 2,
                'time_ago'      => ''
            ]);
            
            if (in_array($object->get('created'), ['-001-11-30 00:00:00', '-1-11-30 00:00:00', '0000-00-00 00:00:00', null])) {
                $array['created'] = '';
            } else {
                $array['created']   = date($this->getProperty('dateFormat'), strtotime($object->get('created')));
                $array['time_ago']  = $this->modx->kv->getTimeAgo($object->get('created'));
            }
            
            return $array;	
        }
    }
    
    return 'KvReviewsGetListProcessor';
	
?>