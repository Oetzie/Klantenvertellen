<?php

/**
 * Klantenvertellen
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

class KlantenVertellen
{
    /**
     * @access public.
     * @var modX.
     */
    public $modx;

    /**
     * @access public.
     * @var Array.
     */
    public $config = [];

    /**
     * @access public.
     * @param modX $modx.
     * @param Array $config.
     */
    public function __construct(modX &$modx, array $config = [])
    {
        $this->modx =& $modx;

        $corePath   = $this->modx->getOption('klantenvertellen.core_path', $config, $this->modx->getOption('core_path') . 'components/klantenvertellen/');
        $assetsUrl  = $this->modx->getOption('klantenvertellen.assets_url', $config, $this->modx->getOption('assets_url') . 'components/klantenvertellen/');
        $assetsPath = $this->modx->getOption('klantenvertellen.assets_path', $config, $this->modx->getOption('assets_path') . 'components/klantenvertellen/');

        $this->config = array_merge([
            'namespace'             => 'klantenvertellen',
            'lexicons'              => ['klantenvertellen:default'],
            'base_path'             => $corePath,
            'core_path'             => $corePath,
            'model_path'            => $corePath . 'model/',
            'processors_path'       => $corePath . 'processors/',
            'elements_path'         => $corePath . 'elements/',
            'chunks_path'           => $corePath . 'elements/chunks/',
            'plugins_path'          => $corePath . 'elements/plugins/',
            'snippets_path'         => $corePath . 'elements/snippets/',
            'templates_path'        => $corePath . 'templates/',
            'assets_path'           => $assetsPath,
            'js_url'                => $assetsUrl . 'js/',
            'css_url'               => $assetsUrl . 'css/',
            'assets_url'            => $assetsUrl,
            'connector_url'         => $assetsUrl . 'connector.php',
            'version'               => '1.3.0',
            'branding_url'          => $this->modx->getOption('klantenvertellen.branding_url', null, ''),
            'branding_help_url'     => $this->modx->getOption('klantenvertellen.branding_url_help', null, ''),
            'cronjob'               => (bool) $this->modx->getOption('klantenvertellen.cronjob', null, false),
            'summary'               => json_decode($this->modx->getOption('klantenvertellen.summary', null, '{}'), true)
        ], $config);

        $this->modx->addPackage('klantenvertellen', $this->config['model_path']);

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
    public function getHelpUrl()
    {
        if (!empty($this->config['branding_help_url'])) {
            return $this->config['branding_help_url'] . '?v=' . $this->config['version'];
        }

        return false;
    }

    /**
     * @access public.
     * @return String|Boolean.
     */
    public function getBrandingUrl()
    {
        if (!empty($this->config['branding_url'])) {
            return $this->config['branding_url'];
        }

        return false;
    }

    /**
     * @access public.
     * @param String $key.
     * @param Array $options.
     * @param Mixed $default.
     * @return Mixed.
     */
    public function getOption($key, array $options = [], $default = null)
    {
        if (isset($options[$key])) {
            return $options[$key];
        }

        if (isset($this->config[$key])) {
            return $this->config[$key];
        }

        return $this->modx->getOption($this->config['namespace'] . '.' . $key, $options, $default);
    }

    /**
     * @access public.
     * @param String $name.
     * @param Array $properties.
     * @param Boolean $usePdoTools.
     * @param Boolean $usePdoElementsPath.
     * @return String.
     */
    public function getChunkTemplate($name, array $properties = [], $usePdoTools = true, $usePdoElementsPath = true)
    {
        if ($usePdoTools && $pdo = $this->modx->getService('pdoTools')) {
            if ($usePdoElementsPath) {
                $properties = array_merge([
                    'elementsPath' => $this->config['core_path']
                ], $properties);
            } else {
                $properties = array_merge([
                    'elementsPath' => $this->modx->getOption('pdotools_elements_path')
                ], $properties);
            }

            return $pdo->getChunk($name, $properties);
        }

        $type = 'CHUNK';

        if (strpos($name, '@') === 0) {
            $type = substr($name, 1, strpos($name, ' ') - 1);
            $name = ltrim(substr($name, strpos($name, ' ') + 1, strlen($name)));
        }

        switch (strtoupper($type)) {
            case 'FILE':
                if (false !== strrpos($name, '.')) {
                    $name = $this->config['core_path'] . $name;
                } else {
                    $name = $this->config['core_path'] . $name . '.chunk.tpl';
                }

                if (file_exists($name)) {
                    $chunk = $this->modx->newObject('modChunk', [
                        'name' => $this->config['namespace'] . uniqid()
                    ]);

                    if ($chunk) {
                        $chunk->setCacheable(false);

                        return $chunk->process($properties, file_get_contents($name));
                    }
                }

                break;
            case 'INLINE':
                $chunk = $this->modx->newObject('modChunk', [
                    'name' => $this->config['namespace'] . uniqid()
                ]);

                if ($chunk) {
                    $chunk->setCacheable(false);

                    return $chunk->process($properties, $name);
                }

                break;
        }

        return $this->modx->getChunk($name, $properties);
    }
}
