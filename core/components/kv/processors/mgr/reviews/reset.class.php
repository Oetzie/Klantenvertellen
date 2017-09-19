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
	 
	class KvReviewsResetProcessor extends modObjectProcessor {
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
		public $objectType = 'kv.reviews';
		
		/**
		 * @access public.
		 * @var Object.
		 */
		public $kv;
		
		/**
		 * @acces public.
		 * @return Mixed.
		 */
		public function initialize() {
			$this->kv = $this->modx->getService('kv', 'Reviews', $this->modx->getOption('kv.core_path', null, $this->modx->getOption('core_path').'components/kv/').'model/kv/');

			return parent::initialize();
		}
		
		/**
		 * @access public.
		 * @return Mixed.
		 */
		public function process() {
			$this->modx->cacheManager->refresh(array(
				'kvreviews' => array()
			));
			
			$this->modx->removeCollection($this->classKey, array());
			
			return $this->outputArray(array());
		}
	}
	
	return 'KvReviewsResetProcessor';
	
?>