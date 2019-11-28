<?php

/**
 * Klantenvertellen
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

class KlantenVertellenReviewsActivateSelectedProcessor extends modProcessor
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

        foreach ((array) explode(',', $this->getProperty('ids')) as $key => $value) {
            $object = $this->modx->getObject($this->classKey, $value);

            if ($object) {
                $object->fromArray([
                    'active' => $this->getProperty('type')
                ]);

                $object->save();
            }
        }

        $this->modx->invokeEvent('onKlantenVertellenUpdate');

        return $this->outputArray([]);
    }
}

return 'KlantenVertellenReviewsActivateSelectedProcessor';
