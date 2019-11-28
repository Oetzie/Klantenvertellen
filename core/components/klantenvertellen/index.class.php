<?php

/**
 * Klantenvertellen
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

abstract class KlantenVertellenManagerController extends modExtraManagerController
{
    /**
     * @access public.
     * @return Mixed.
     */
    public function initialize()
    {
        $this->modx->getService('klantenvertellen', 'KlantenVertellen', $this->modx->getOption('klantenvertellen.core_path', null, $this->modx->getOption('core_path') . 'components/klantenvertellen/') . 'model/klantenvertellen/');

        $this->addCss($this->modx->klantenvertellen->config['css_url'] . 'mgr/klantenvertellen.css');

        $this->addJavascript($this->modx->klantenvertellen->config['js_url'] . 'mgr/klantenvertellen.js');

        $this->addJavascript($this->modx->klantenvertellen->config['js_url'] . 'mgr/extras/extras.js');

        $this->addHtml('<script type="text/javascript">
            Ext.onReady(function() {
                MODx.config.help_url = "' . $this->modx->klantenvertellen->getHelpUrl() . '";
                
                KlantenVertellen.config = ' . $this->modx->toJSON(array_merge($this->modx->klantenvertellen->config, [
                    'branding_url'      => $this->modx->klantenvertellen->getBrandingUrl(),
                    'branding_url_help' => $this->modx->klantenvertellen->getHelpUrl()
                ])) . ';
            });
        </script>');

        return parent::initialize();
    }

    /**
     * @access public.
     * @return Array.
     */
    public function getLanguageTopics()
    {
        return $this->modx->klantenvertellen->config['lexicons'];
    }

    /**
     * @access public.
     * @returns Boolean.
     */
    public function checkPermissions()
    {
        return $this->modx->hasPermission('klantenvertellen');
    }
}

class IndexManagerController extends KlantenVertellenManagerController
{
    /**
     * @access public.
     * @return String.
     */
    public static function getDefaultController()
    {
        return 'home';
    }
}
