<?php

/**
 * Klantenvertellen
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

require_once dirname(__DIR__) . '/klantenvertellensnippets.class.php';

class KlantenVertellenSnippet extends KlantenVertellenSnippets
{
    /**
     * @access public.
     * @var Array.
     */
    public $properties = [
        'limit'                 => 10,
        'where'                 => '{"active": "1"}',
        'sortby'                => '{"created": "DESC"}',
        'placeholders'          => '{"total": "reviews.total"}',

        'tpl'                   => '@FILE elements/chunks/item.chunk.tpl',
        'tplWrapper'            => '@FILE elements/chunks/wrapper.chunk.tpl',
        'tplWrapperEmpty'       => '',

        'usePdoTools'           => false,
        'usePdoElementsPath'    => false
    ];

    /**
     * @access public.
     * @param Array $properties.
     * @return String.
     */
    public function run(array $properties = [])
    {
        $this->setProperties($properties);

        $output         = [];

        $where          = json_decode($this->getProperty('where'), true);
        $sortby         = json_decode($this->getProperty('sortby'), true);
        $limit          = (int) $this->getProperty('limit');
        $placeholders   = json_decode($this->getProperty('placeholders'), true);

        $criteria = $this->modx->newQuery('KlantenVertellenReview');

        if ($where) {
            $criteria->where($where);
        }

        if (isset($placeholders['total'])) {
            $this->modx->setPlaceholder($placeholders['total'], $this->modx->getCount('KlantenVertellenReview', $criteria));
        }

        if ($sortby) {
            foreach ((array) $sortby as $key => $value) {
                if (in_array($value, ['RAND', 'RAND()'], true)) {
                    $criteria->sortby('RAND()');
                } else {
                    $criteria->sortby($key, $value);
                }
            }
        }

        if ($limit > 1) {
            $criteria->limit($limit);
        }

        $idx = 1;

        foreach ($this->modx->getCollection('KlantenVertellenReview', $criteria) as $review) {
            $output[] = $this->getChunk($this->getProperty('tpl'), array_merge($review->toArray(), [
                'idx'           => $idx,
                'content_html'  => nl2br($review->get('content')),
                'rating_stars'  => round((float) $review->get('rating')) / 2,
                'time_ago'      => $review->getTimeAgo()
            ]));

            $idx++;
        }

        if (!empty($output)) {
            $tplWrapper = $this->getProperty('tplWrapper');

            if (!empty($tplWrapper)) {
                return $this->getChunk($tplWrapper, [
                    'output'    => implode(PHP_EOL, $output),
                    'summary'   => $this->config['summary']
                ]);
            }

            return implode(PHP_EOL, $output);
        }

        $tplWrapperEmpty = $this->getProperty('tplWrapperEmpty');

        if (!empty($tplWrapperEmpty)) {
            return $this->getChunk($tplWrapperEmpty, [
                'summary'   => $this->config['summary']
            ]);
        }

        return '';
    }
}
