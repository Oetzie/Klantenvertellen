<?php

/**
 * Klantenvertellen
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

class KlantenVertellenReviewsUpdateProcessor extends modObjectUpdateProcessor
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
    public function afterSave()
    {
        $this->modx->cacheManager->refresh([
            'klantenvertellenreviews' => []
        ]);

        $this->modx->invokeEvent('onKlantenVertellenUpdate');

        return parent::afterSave();
    }
}

return 'KlantenVertellenReviewsUpdateProcessor';
