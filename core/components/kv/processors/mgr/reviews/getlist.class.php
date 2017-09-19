<?php

	/**
	 * Klantenvertellen
	 *
	 * Copyright 2017 by Oene Tjeerd de Bruin <modx@oetzie.nl>
	 *
	 * Klantenvertellen is free software; you can redistribute it and/or modify it under
	 * the terms of the GNU General Public License as published by the Free Software
	 * Foundation; either version 2 of the License, or (at your option) any later
	 * version.
	 *
	 * Klantenvertellen is distributed in the hope that it will be useful, but WITHOUT ANY
	 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
	 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
	 *
	 * You should have received a copy of the GNU General Public License along with
	 * Klantenvertellen; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
	 * Suite 330, Boston, MA 02111-1307 USA
	 */
	 
	class KvReviewsGetListProcessor extends modObjectGetListProcessor {
		/**
		 * @access public.
		 * @var String.
		 */
		public $classKey = 'KvReviews';
		
		/**
		 * @access public.
		 * @var Array.
		 */
		public $languageTopics = array('kv:default');
		
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
		public $objectType = 'kv.reviews';
		
		/**
		 * @access public.
		 * @var Object.
		 */
		public $kv;
		
		/**
		 * @access public.
		 * @return Mixed.
		 */
		public function initialize() {
			$this->kv = $this->modx->getService('kv', 'Reviews', $this->modx->getOption('kv.core_path', null, $this->modx->getOption('core_path').'components/kv/').'model/kv/');
			
			$this->setDefaultProperties(array(
				'dateFormat' => $this->modx->getOption('manager_date_format') .', '. $this->modx->getOption('manager_time_format')
			));
			
			return parent::initialize();
		}
		
		/**
		 * @access public.
		 * @param Object $c.
		 * @return Object.
		 */
		public function prepareQueryBeforeCount(xPDOQuery $c) {
			$c->select($this->modx->getSelectColumns('KvReviews', 'KvReviews'));
			$c->select('((service + expertise + price) / 3) AS `average`');
			
			$status = $this->getProperty('status');
			
			if ('' != $status) {
				$c->where(array(
					'active' => $status
				));
			}
			
			$query = $this->getProperty('query');
			
			if (!empty($query)) {
				$c->where(array(
					'name:LIKE'				=> '%'.$query.'%',
					'OR:city:LIKE'			=> '%'.$query.'%',
					'OR:content:LIKE' 		=> '%'.$query.'%'
				));
			}

			return $c;
		}
		
		/**
		 * @access public.
		 * @param Object $query.
		 * @return Array.
		 */
		public function prepareRow(xPDOObject $object) {
			$array = array_merge($object->toArray(), array(
				'average' 		=> round($object->average),
				'avarage_stars'	=> round(($object->average / 2) * 2) / 2,
				'time_ago' 		=> ''
			));
			
			if (in_array($array['created'], array('-001-11-30 00:00:00', '-1-11-30 00:00:00', '0000-00-00 00:00:00', null))) {
				$array['created'] = '';
			} else {
				$array['created'] 	= date($this->getProperty('dateFormat'), strtotime($array['created']));
				$array['time_ago']	= $this->kv->getTimeAgo($array['created']);
			}
			
			return $array;	
		}
	}

	return 'KvReviewsGetListProcessor';
	
?>