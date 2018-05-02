<?php

    /**
     * Klantenvertellen
     *
     * Copyright 2018 by Oene Tjeerd de Bruin <modx@oetzie.nl>
     */
    
    abstract class KvManagerController extends modExtraManagerController {
        /**
         * @access public.
         * @return Mixed.
         */
        public function initialize() {
            $this->modx->getService('kv', 'Kv', $this->modx->getOption('kv.core_path', null, $this->modx->getOption('core_path') . 'components/kv/') . 'model/kv/');
            
            $this->addJavascript($this->modx->kv->config['js_url'] . 'mgr/kv.js');
            
            $this->addHtml('<script type="text/javascript">
                Ext.onReady(function() {
                    MODx.config.help_url = "' . $this->modx->kv->getHelpUrl() . '";
                    
                    Kv.config = ' . $this->modx->toJSON(array_merge($this->modx->kv->config, [
                        'branding_url'      => $this->modx->kv->getBrandingUrl(),
                        'branding_url_help' => $this->modx->kv->getHelpUrl()
                    ])) . ';
                });
            </script>');
            
            return parent::initialize();
        }
    
        /**
         * @access public.
         * @return Array.
         */
        public function getLanguageTopics() {
            return $this->modx->kv->config['lexicons'];
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