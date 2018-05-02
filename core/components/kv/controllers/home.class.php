<?php

    /**
     * Klantenvertellen
     *
     * Copyright 2018 by Oene Tjeerd de Bruin <modx@oetzie.nl>
     */
    
    require_once dirname(__DIR__) . '/index.class.php';
    
    class KvHomeManagerController extends KvManagerController {
        /**
         * @access public.
         */
        public function loadCustomCssJs() {
            $this->addCss($this->modx->kv->config['css_url'] . 'mgr/kv.css');
            
            $this->addJavascript($this->modx->kv->config['js_url'] . 'mgr/widgets/home.panel.js');
            
            $this->addJavascript($this->modx->kv->config['js_url'] . 'mgr/widgets/reviews.grid.js');
            
            $this->addLastJavascript($this->modx->kv->config['js_url'] . 'mgr/sections/home.js');
        }
    
        /**
         * @access public.
         * @return String.
         */
        public function getPageTitle() {
            return $this->modx->lexicon('kv');
        }
        
        /**
         * @access public.
         * @return String.
         */
        public function getTemplateFile() {
            return $this->modx->kv->config['templates_path'] . 'home.tpl';
        }
    }

?>