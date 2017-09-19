<?php

	/**
	 * Klantenvertellen
	 *
	 * Copyright 2017 by Oene Tjeerd de Bruin <modx@oetzie.nl>
	 *
	 * Klantenvertellen is free software; you can redistribute it and/or modify it under
	 * the terms of the GNU General Public License as published by the Free Software
	 * Foundation; either version 2 of the License, or (at your option) any later
	 * version.
	 *
	 * Klantenvertellen is distributed in the hope that it will be useful, but WITHOUT ANY
	 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
	 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
	 *
	 * You should have received a copy of the GNU General Public License along with
	 * Klantenvertellen; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
	 * Suite 330, Boston, MA 02111-1307 USA
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
		 * @var Array.
		 */
		public $properties = array();

		/**
		 * @access public.
		 * @param Object $modx.
		 * @param Array $config.
		 */
		public function __construct(modX &$modx, array $config = array()) {
			$this->modx =& $modx;

			$corePath 		= $this->modx->getOption('kv.core_path', $config, $this->modx->getOption('core_path').'components/kv/');
			$assetsUrl 		= $this->modx->getOption('kv.assets_url', $config, $this->modx->getOption('assets_url').'components/kv/');
			$assetsPath 	= $this->modx->getOption('kv.assets_path', $config, $this->modx->getOption('assets_path').'components/kv/');
		
			$this->config = array_merge(array(
				'namespace'				=> $this->modx->getOption('namespace', $config, 'kv'),
				'lexicons'				=> array('kv:default'),
				'base_path'				=> $corePath,
				'core_path' 			=> $corePath,
				'model_path' 			=> $corePath.'model/',
				'processors_path' 		=> $corePath.'processors/',
				'elements_path' 		=> $corePath.'elements/',
				'chunks_path' 			=> $corePath.'elements/chunks/',
				'cronjobs_path' 		=> $corePath.'elements/cronjobs/',
				'plugins_path' 			=> $corePath.'elements/plugins/',
				'snippets_path' 		=> $corePath.'elements/snippets/',
				'templates_path' 		=> $corePath.'templates/',
				'assets_path' 			=> $assetsPath,
				'js_url' 				=> $assetsUrl.'js/',
				'css_url' 				=> $assetsUrl.'css/',
				'assets_url' 			=> $assetsUrl,
				'connector_url'			=> $assetsUrl.'connector.php',
				'version'				=> '1.0.0',
				'branding_url'			=> $this->modx->getOption('kv.branding_url', null, ''),
				'branding_help_url'		=> $this->modx->getOption('kv.branding_url_help', null, '')
			), $config);
			
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
                return $this->config['branding_help_url'].'?v=' . $this->config['version'];
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
		 * @param String $tpl.
		 * @param Array $properties.
		 * @param String $type.
		 * @return String.
		 */
		protected function getTemplate($template, $properties = array(), $type = 'CHUNK') {
			if (0 === strpos($template, '@')) {
				$type 		= substr($template, 1, strpos($template, ':') - 1);
				$template	= substr($template, strpos($template, ':') + 1, strlen($template));
			}
			
			switch (strtoupper($type)) {
				case 'INLINE':
					$chunk = $this->modx->newObject('modChunk', array(
						'name' => $this->config['namespace'].uniqid()
					));
				
					$chunk->setCacheable(false);
				
					$output = $chunk->process($properties, ltrim($template));
				
					break;
				case 'CHUNK':
					$output = $this->modx->getChunk(ltrim($template), $properties);
				
					break;
			}
			
			return $output;
		}
		
		/**
		 * @access public.
		 * @param Array $scriptProperties.
		 * @return Boolean.
		 */
		public function setScriptProperties($scriptProperties = array()) {
			$this->properties = array_merge(array(
				'limit'			=> 10,
				'sort'			=> '{"created": "DESC"}',
			), $scriptProperties);

			return $this->setDefaultProperties();
		}
		
		/**
		 * @access protected.
		 * @return Boolean.
		 */
		protected function setDefaultProperties() {
			if (is_string($this->properties['limit'])) {
				$this->properties['limit'] = (int) $this->properties['limit'];
			}
						
			if (is_string($this->properties['sort'])) {
				if (!in_array(strtoupper($this->properties['sort']), array('RAND', 'RAND()'))) {
					if (false === strstr($this->properties['sort'], '{')) {
						$this->properties['sort'] = array(
							$this->properties['sort'] => 'ASC'
						);
					} else {
						$this->properties['sort'] = $this->modx->fromJSON($this->properties['sort']);
					}
				}
			}
			
			return true;
		}
		
		/**
		 * @access public.
		 * @param Array $properties.
		 * @return String.
		 */
		public function run($properties = array()) {
			$this->setScriptProperties($properties);
			
			$c = $this->modx->newQuery('KvReviews');
			
			$c->select($this->modx->getSelectColumns('KvReviews', 'KvReviews'));
			$c->select('((service + expertise + price) / 3) AS `average`');
			
			$c->where(array(
				'active' => 1
			));
			
			if (is_array($this->properties['sort'])) {
				foreach ($this->properties['sort'] as $key => $value) {
					$c->sortby($key, $value);
				}
			} else if (is_string($this->properties['sort'])) {
				if (in_array(strtoupper($this->properties['sort']), array('RAND', 'RAND()'))) {
					$c->sortby('RAND()');
				}
			}
			
			if (0 != $this->properties['limit']) {
				$c->limit($this->properties['limit']);
			}

			$output	= array();
			
			foreach ($this->modx->getCollection('KvReviews', $c) as $key => $value) {
				$class = array();
							
				if (0 == $key) {
					$class[] = 'first';
				}
				
				if (count($output) - 1 == $key) {
					$class[] = 'last';
				}
				
				$class[] = 0 == $key % 2 ? 'odd' : 'even';
					
				$output[] = $this->getTemplate($this->properties['tpl'], array_merge(array(
					'class'			=> implode(' ', $class),
					'average' 		=> round($value->average),
					'avarage_stars'	=> str_replace(array(',', '.'), '-', round(($value->average / 2) * 2) / 2),
					'time_ago' 		=> $this->getTimeAgo($value->created)
				), $value->toArray()));
			}
			
			if (0 < count($output)) {
				if (isset($this->properties['tplWrapper'])) {
					return $this->getTemplate($this->properties['tplWrapper'], array(
						'output' => implode(PHP_EOL, $output)
					));
				}
				
				return implode(PHP_EOL, $output);
			}
			
			if (isset($this->properties['tplWrapperEmpty'])) {
				return $this->getTemplate($this->properties['tplWrapperEmpty']);
			}

			return '';	
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
               
            $output = array(
	            'minutes'	=> $minutes,
	            'hours'		=> ceil($minutes / 60),
    		    'days'      => $days,
    		    'weeks'     => ceil($days / 7),
    		    'months'    => ceil($days / 30),
    		    'date'      => $date
    	    );
    	    
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