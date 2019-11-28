<?php

/**
 * Klantenvertellen
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

require_once dirname(__DIR__) . '/index.class.php';

class KlantenVertellenHomeManagerController extends KlantenVertellenManagerController
{
    /**
     * @access public.
     */
    public function loadCustomCssJs()
    {
        $this->addJavascript($this->modx->klantenvertellen->config['js_url'] . 'mgr/widgets/home.panel.js');

        $this->addJavascript($this->modx->klantenvertellen->config['js_url'] . 'mgr/widgets/reviews.grid.js');

        $this->addLastJavascript($this->modx->klantenvertellen->config['js_url'] . 'mgr/sections/home.js');
    }

    /**
     * @access public.
     * @return String.
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('klantenvertellen');
    }

    /**
     * @access public.
     * @return String.
     */
    public function getTemplateFile()
    {
        return $this->modx->klantenvertellen->config['templates_path'] . 'home.tpl';
    }
}
