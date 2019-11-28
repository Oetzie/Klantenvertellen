<?php

/**
 * Klantenvertellen
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

class KlantenVertellenReviewsGetListProcessor extends modObjectGetListProcessor
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
    public $defaultSortField = 'created';

    /**
     * @access public.
     * @var String.
     */
    public $defaultSortDirection = 'DESC';

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

        $this->setDefaultProperties([
            'dateFormat' => $this->modx->getOption('manager_date_format') . ', ' . $this->modx->getOption('manager_time_format')
        ]);

        return parent::initialize();
    }

    /**
     * @access public.
     * @param xPDOQuery $criteria.
     * @return xPDOQuery.
     */
    public function prepareQueryBeforeCount(xPDOQuery $criteria)
    {
        $status = $this->getProperty('status', '');

        if ($status !== '') {
            $criteria->where([
                'active' => $status
            ]);
        }

        $query = $this->getProperty('query');

        if (!empty($query)) {
            $criteria->where([
                'name:LIKE'         => '%' . $query . '%',
                'OR:city:LIKE'      => '%' . $query . '%',
                'OR:content:LIKE'   => '%' . $query . '%'
            ]);
        }

        return $criteria;
    }

    /**
     * @access public.
     * @param xPDOObject $object.
     * @return Array.
     */
    public function prepareRow(xPDOObject $object) {
        $array = array_merge($object->toArray(), [
            'rating_stars'  => round((float) $object->get('rating')) / 2,
            'time_ago'      => ''
        ]);

        if (in_array($object->get('created'), ['-001-11-30 00:00:00', '-1-11-30 00:00:00', '0000-00-00 00:00:00', null], true)) {
            $array['created'] = '';
        } else {
            $array['created']   = date($this->getProperty('dateFormat'), strtotime($object->get('created')));

            $array['time_ago']  = $object->getTimeAgo();
        }

        return $array;
    }
}

return 'KlantenVertellenReviewsGetListProcessor';
