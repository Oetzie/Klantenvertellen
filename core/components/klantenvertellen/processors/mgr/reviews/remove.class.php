<?php

/**
 * Klantenvertellen
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

class KlantenVertellenRemoveResetProcessor extends modObjectProcessor
{
    /**
     * @access public.
     * @var String.
     */
    public $classKey = 'KlantenVertellenReview';

    /**
     * @access public.
     * @var Array.
     */
    public $languageTopics = ['klantenvertellen:default'];

    /**
     * @access public.
     * @var String.
     */
    public $objectType = 'klantenvertellen.review';

    /**
     * @access public.
     * @return Mixed.
     */
    public function initialize()
    {
        $this->modx->getService('klantenvertellen', 'KlantenVertellen', $this->modx->getOption('klantenvertellen.core_path', null, $this->modx->getOption('core_path') . 'components/klantenvertellen/') . 'model/klantenvertellen/');

        return parent::initialize();
    }

    /**
     * @access public.
     * @return Mixed.
     */
    public function process()
    {
        $this->modx->cacheManager->refresh([
            'klantenvertellenreviews' => []
        ]);

        $this->modx->removeCollection($this->classKey, []);

        $this->modx->invokeEvent('onKlantenVertellenUpdate');

        return $this->outputArray([]);
    }
}

return 'KlantenVertellenRemoveResetProcessor';
