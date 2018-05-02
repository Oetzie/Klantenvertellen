<?php

    /**
     * Klantenvertellen
     *
     * Copyright 2018 by Oene Tjeerd de Bruin <modx@oetzie.nl>
     */
    
    class Kv {
        /**
         * @access public.
         * @var Object.
         */
        public $modx;
        
        /**
         * @access public.
         * @var Array.
         */
        public $config = array();
    
        /**
         * @access public.
         * @param Object $modx.
         * @param Array $config.
         */
        public function __construct(modX &$modx, array $config = []) {
            $this->modx =& $modx;
    
            $corePath       = $this->modx->getOption('kv.core_path', $config, $this->modx->getOption('core_path') . 'components/kv/');
            $assetsUrl      = $this->modx->getOption('kv.assets_url', $config, $this->modx->getOption('assets_url') . 'components/kv/');
            $assetsPath     = $this->modx->getOption('kv.assets_path', $config, $this->modx->getOption('assets_path') . 'components/kv/');
    
            $this->config = array_merge([
                'namespace'         => $this->modx->getOption('namespace', $config, 'kv'),
                'lexicons'          => ['kv:default'],
                'base_path'         => $corePath,
                'core_path'         => $corePath,
                'model_path'        => $corePath . 'model/',
                'processors_path'   => $corePath . 'processors/',
                'elements_path'     => $corePath . 'elements/',
                'chunks_path'       => $corePath . 'elements/chunks/',
                'plugins_path'      => $corePath . 'elements/plugins/',
                'snippets_path'     => $corePath . 'elements/snippets/',
                'templates_path'    => $corePath . 'templates/',
                'assets_path'       => $assetsPath,
                'js_url'            => $assetsUrl . 'js/',
                'css_url'           => $assetsUrl . 'css/',
                'assets_url'        => $assetsUrl,
                'connector_url'     => $assetsUrl.'connector.php',
                'version'           => '1.1.0',
                'branding_url'      => $this->modx->getOption('kv.branding_url', null, ''),
                'branding_help_url' => $this->modx->getOption('kv.branding_url_help', null, ''),
                'account'           => $this->modx->getOption('kv.account'),
                'summary'           => $this->modx->fromJSON($this->modx->getOption('kv.summary', null, '{}'))
            ], $config);
    
            $this->modx->addPackage('kv', $this->config['model_path']);
            
            if (is_array($this->config['lexicons'])) {
                foreach ($this->config['lexicons'] as $lexicon) {
                    $this->modx->lexicon->load($lexicon);
                }
            } else {
                $this->modx->lexicon->load($this->config['lexicons']);
            }
        }
		
        /**
         * @access public.
         * @return String|Boolean.
         */
        public function getHelpUrl() {
            if (!empty($this->config['branding_help_url'])) {
                return $this->config['branding_help_url'] . '?v=' . $this->config['version'];
            }
            
            return false;
        }
        
        /**
         * @access public.
         * @return String|Boolean.
         */
        public function getBrandingUrl() {
            if (!empty($this->config['branding_url'])) {
                return $this->config['branding_url'];
            }
            
            return false;
        }
        
        /**
         * @access protected.
         * @param String $template.
         * @param Array $properties.
         * @return String.
         */
        protected function getTemplate($template, $properties = []) {
            $type   = 'CHUNK';
            
            if (0 === strpos($template, '@')) {
                $type       = substr($template, 1, strpos($template, ':') - 1);
                $template   = ltrim(substr($template, strpos($template, ':') + 1, strlen($template)));
            }
            
            switch (strtoupper($type)) {
                case 'FILE':
                    if (false !== strstr($template, '.')) {
                        $template = $this->config['chunks_path'] . $template;
                    } else {
                        $template = $this->config['chunks_path'] . $template . '.chunk.tpl';
                    }
                    
                    if (file_exists($template)) {
                        $chunk = $this->modx->newObject('modChunk', [
                            'name' => $this->config['namespace'] . uniqid()
                        ]);
                        
                        if ($chunk) {
                            $chunk->setCacheable(false);
                            
                            return $chunk->process($properties, file_get_contents($template));
                        }
                    }
                
                    break;
                case 'INLINE':
                    $chunk = $this->modx->newObject('modChunk', [
                        'name' => $this->config['namespace'] . uniqid()
                    ]);
                    
                    if ($chunk) {
                        $chunk->setCacheable(false);
                        
                        return $chunk->process($properties, $template);
                    }
                
                    break;
            }
            
            return $this->modx->getChunk($template, $properties);
        }
		
        /**
         * @access public.
         * @param String|Integer $timestamp.
         * @return String.
         */
        public function getTimeAgo($timestamp) {
            if (is_string($timestamp)) {
                $timestamp = strtotime($timestamp);
            }
            
            $days = floor((time() - $timestamp) / 86400);
            $minutes = floor((time() - $timestamp) / 60);
            
            $output = [
                'minutes'   => $minutes,
                'hours'     => ceil($minutes / 60),
                'days'      => $days,
                'weeks'     => ceil($days / 7),
                'months'    => ceil($days / 30),
                'date'      => $date
            ];
        
            if ($days < 1) {
                if ($minutes < 1) {
                    return $this->modx->lexicon('kv.time_seconds', $output);
                } else if ($minutes == 1) {
                    return $this->modx->lexicon('kv.time_minute', $output);
                } else if ($minutes <= 59) {
                    return $this->modx->lexicon('kv.time_minutes', $output);
                } else if ($minutes == 60) {
                    return $this->modx->lexicon('kv.time_hour', $output);
                } else if ($minutes <= 1380) {
                    return $this->modx->lexicon('kv.time_hours', $output);
                } else {
                    return $this->modx->lexicon('kv.time_day', $output);
                }
            } else if ($days == 1) {
                return $this->modx->lexicon('kv.time_day', $output);
            } else if ($days <= 6) {
                return $this->modx->lexicon('kv.time_days', $output);
            } else if ($days <= 7) {
                return $this->modx->lexicon('kv.time_week', $output);
            } else if ($days <= 29) {
                return $this->modx->lexicon('kv.time_weeks', $output);
            } else if ($days <= 30) {
                return $this->modx->lexicon('kv.time_month', $output);
            } else if ($days <= 180) {
                return $this->modx->lexicon('kv.time_months', $output);
            } else {
                return $this->modx->lexicon('kv.time_to_long', $output);
            }
        }
    }

?>