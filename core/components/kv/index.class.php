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

	abstract class KvManagerController extends modExtraManagerController {
		/**
		 * @access public.
		 * @var Object.
		 */
		public $kv;
		
		/**
		 * @access public.
		 * @return Mixed.
		 */
		public function initialize() {
			$this->kv = $this->modx->getService('kv', 'Kv', $this->modx->getOption('kv.core_path', null, $this->modx->getOption('core_path').'components/kv/').'model/kv/');
			
			$this->addJavascript($this->kv->config['js_url'].'mgr/kv.js');
			
			$this->addHtml('<script type="text/javascript">
				Ext.onReady(function() {
					MODx.config.help_url = "'.$this->kv->getHelpUrl().'";

					Kv.config = '.$this->modx->toJSON(array_merge($this->kv->config, array(
                        'branding_url'          => $this->kv->getBrandingUrl(),
                        'branding_url_help'     => $this->kv->getHelpUrl()
                    ))).';
				});
			</script>');
			
			return parent::initialize();
		}
		
		/**
		 * @access public.
		 * @return Array.
		 */
		public function getLanguageTopics() {
			return $this->kv->config['lexicons'];
		}
		
		/**
		 * @access public.
		 * @returns Boolean.
		 */	    
		public function checkPermissions() {
			return $this->modx->hasPermission('kv');
		}
	}
		
	class IndexManagerController extends KvManagerController {
		/**
		 * @access public.
		 * @return String.
		 */
		public static function getDefaultController() {
			return 'home';
		}
	}

?>