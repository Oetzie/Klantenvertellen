<?php

    /**
     * Klantenvertellen
     *
     * Copyright 2018 by Oene Tjeerd de Bruin <modx@oetzie.nl>
     */
     
    require_once __DIR__ . '/kv.class.php';

    class KvReviewsSnippet extends Kv {
        /**
         * @access public.
         * @var Array.
         */
        public $properties = [];
        
        /**
         * @access public.
         * @param Array $properties.
         * @return Boolean.
         */
        public function setScriptProperties($properties = []) {
            $this->setDefaultScriptProperties(array_merge([
                'limit'         => 10,
                'placeholders'  => '{"total": "reviews.total"}',
                'sort'          => '{"created": "DESC"}',
                'tpl'           => '@FILE:reviewItemTpl',
                'tplWrapper'    => '@FILE:reviewsWrapperTpl',
                'type'          => 'HTML',
            ], $properties));
        }
        
        /**
         * @access protected.
         * @param Array $properties.
         * @return Boolean.
         */
        protected function setDefaultScriptProperties($properties = []) {
            if (is_string($properties['limit'])) {
                $properties['limit'] = (int) $properties['limit'];
            }
            
            if (is_string($properties['placeholders'])) {
                $properties['placeholders'] = array_merge([
                    'total' => 'reviews.total'
                ], $this->modx->fromJSON($properties['placeholders']));
            } else {
                $properties['placeholders'] = array_merge([
                    'total' => 'reviews.total'
                ], $properties['placeholders']);
            }
            
            $properties['type'] = strtoupper($properties['type']);
        
            if (is_string($properties['sort'])) {
                if (!in_array(strtoupper($properties['sort']), ['RAND', 'RAND()'])) {
                    if ('{' !== substr($properties['sort'], 0, 1)) {
                        $properties['sort'] = [
                            $properties['sort'] => 'ASC'
                        ];
                    } else {
                        $properties['sort'] = $this->modx->fromJSON($properties['sort']);
                    }
                }
            }
            
            return $this->properties = $properties;
        }
		
        /**
         * @access public.
         * @param Array $properties.
         * @return String.
         */
        public function run($properties = []) {
            $this->setScriptProperties($properties);
            
            $c = $this->modx->newQuery('KvReview');
            
            $c->select($this->modx->getSelectColumns('KvReview', 'KvReview'));
            $c->select('ROUND(((service + expertise + price) / 3), 1) AS `average`');
            
            $c->where([
                'active' => 1
            ]);
            
            $this->modx->setPlaceholder($this->properties['placeholders']['total'], $this->modx->getCount('KvReview', $c));
            
            if (is_array($this->properties['sort'])) {
                foreach ($this->properties['sort'] as $key => $value) {
                    $c->sortby($key, $value);
                }
            } else if (is_string($this->properties['sort'])) {
                if (in_array(strtoupper($this->properties['sort']), ['RAND', 'RAND()'])) {
                    $c->sortby('RAND()');
                }
            }
            
            if (0 !== (int) $this->properties['limit']) {
                if (isset($this->properties['offset'])) {
                    $c->limit($this->properties['limit'], $this->properties['offset']);
                } else {
                     $c->limit($this->properties['limit']);
                }
            }
        
            $output	= [];
            $data   = $this->modx->getCollection('KvReview', $c);
			
            foreach ($data as $key => $value) {
                if ('ARRAY' === $this->properties['type']) {
                    $output[] = array_merge($value->toArray(), [
                        'avarage_stars'	=> round((float) $value->get('average')) / 2,
                        'time_ago'      => $this->getTimeAgo($value->get('created'))
                    ]);
                } else if ('JSON' === $this->properties['type']) {
                    $output[] = array_merge($value->toArray(), [
                        'avarage_stars'	=> round((float) $value->get('average')) / 2,
                        'time_ago'      => $this->getTimeAgo($value->get('created'))
                    ]);
                } else {
                    $class = [];
                    
                    if (0 === $key) {
                        $class[] = 'first';
                    }
        
                    if (count($data) - 1 === $key) {
                        $class[] = 'last';
                    }
        
                    $class[] = 0 === $key % 2 ? 'odd' : 'even';
    					
                    $output[] = $this->getTemplate($this->properties['tpl'], array_merge($value->toArray(), [
                        'class'         => implode(' ', $class),
                        'avarage_stars' => round((float) $value->get('average')) / 2,
                        'time_ago'      => $this->getTimeAgo($value->get('created'))
                    ]));
                }
            }
			
            if (0 < count($output)) {
                if ('ARRAY' === $this->properties['type']) {
                    return [
                        'total'     => count($output),
                        'summary'   => $this->config['summary'],
                        'output'    => $output
                    ];
                } else if ('JSON' === $this->properties['type']) {
                    return $this->modx->toJSON([
                        'total'     => count($output),
                        'summary'   => $this->config['summary'],
                        'output'    => $output
                    ]);
                } else {
                    if (isset($this->properties['tplWrapper'])) {
                        return $this->getTemplate($this->properties['tplWrapper'], [
                            'summary'   => $this->config['summary'],
                            'output'    => implode(PHP_EOL, $output)
                        ]);
                    }
                    
                    return implode(PHP_EOL, $output);
                }
            }
			
            if ('ARRAY' === $this->properties['type']) {
                return [
                    'total'     => 0,
                    'summary'   => $this->config['summary'],
                    'output'    => []
                ];
            } else if ('JSON' === $this->properties['type']) {
                return $this->modx->toJSON([
                    'total'     => 0,
                    'summary'   => $this->config['summary'],
                    'output'    => []
                ]);
            } else {
                if (isset($this->properties['tplWrapperEmpty'])) {
                    return $this->getTemplate($this->properties['tplWrapperEmpty'], [
                        'summary' => $this->config['summary']
                    ]);
                }
            }

            return '';	
        }
    }

?>