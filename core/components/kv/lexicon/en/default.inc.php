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

	$_lang['kv'] 															= 'Klantenvertellen';
	$_lang['kv.desc']														= 'Manage all Klantenvertellen reviews.';
		
	$_lang['area_kv']														= 'Klantenvertellen';
	
	$_lang['setting_kv.branding_url']              							= 'Branding';
    $_lang['setting_kv.branding_url_desc']         							= 'The URL of the branding button, if the URL is empty the branding button won\'t be shown.';
    $_lang['setting_kv.branding_url_help']         							= 'Branding (help)';
    $_lang['setting_kv.branding_url_help_desc']   		 					= 'The URL of the branding help button, if the URL is empty the branding help button won\'t be shown.';
	$_lang['setting_kv.cronjob']											= 'Cronjob reminder';
	$_lang['setting_kv.cronjob_desc']										= 'Set this setting to "Yes" if you set up a cronjob for social media, By setting this setting to "Yes" the cronjob notification is no longer displayed.';
	$_lang['setting_kv.api_endpoint']										= 'API URL';
	$_lang['setting_kv.api_endpoint_desc']									= 'The url of the Klantenvertellen API.';
	$_lang['setting_kv.default_active']										= 'Default status';
	$_lang['setting_kv.default_active_desc']								= 'The default status of the reviews during the synchronizing of Klantenvertellen.';
	$_lang['setting_kv.log_send']											= 'Send log';
	$_lang['setting_kv.log_send_desc']										= 'When yes, send the log file that will be created by email.';
	$_lang['setting_kv.log_email']											= 'Log e-mail address(es)';
	$_lang['setting_kv.log_email_desc']										= 'The e-mail address(es) where the log file needs to be send. Separate e-mail addresses with a comma.';	
	$_lang['setting_kv.log_lifetime']										= 'Log lifetime';
	$_lang['setting_kv.log_lifetime_desc']									= 'The number of days that a log file needs to be saved, after this the log file will be deleted automatically.';
	
	$_lang['kvreviews_snippet_limit_desc']									= 'The number of reviews that will be shown. Default is "10".';
	$_lang['kvreviews_snippet_sort_desc']									= 'The sort direction of the social media messages. Default is "{"created": "DESC"}".';
	
	$_lang['kv.review']														= 'Review';
	$_lang['kv.reviews']													= 'Reviews';
	$_lang['kv.reviews_desc']												= 'Manage here the synchronized reviews of Klantenvertellen. These reviews will synchronized automatically each hour from Klantenvertellen with MODX.';
	$_lang['kv.review_activate']											= 'Show review';
	$_lang['kv.review_activate_confirm']									= 'Are you sure you want to show this review?';
	$_lang['kv.review_deactivate']											= 'Hide review';
	$_lang['kv.review_deactivate_confirm']									= 'Are you sure you want to hide this review?';
	$_lang['kv.reviews_activate_selected']									= 'Show selected reviews';
	$_lang['kv.reviews_activate_selected_confirm']							= 'Are you sure you want to show the selected reviews?';
	$_lang['kv.reviews_deactivate_selected']								= 'Hide selected reviews';
	$_lang['kv.reviews_deactivate_selected_confirm']						= 'Are you sure you want to hide the selected reviews?';
	$_lang['kv.reviews_reset']												= 'Delete all reviews';
	$_lang['kv.reviews_reset_confirm']										= 'Are you sure you want to delete all the reviews?';
	
	$_lang['kv.label_name']													= 'Name';
	$_lang['kv.label_name_desc']											= '';
	$_lang['kv.label_city']													= 'City';
	$_lang['kv.label_city_desc']											= '';
	$_lang['kv.label_content']												= 'Review';
	$_lang['kv.label_content_desc']											= '';
	$_lang['kv.label_average']												= 'Average';
	$_lang['kv.label_avarage_desc']											= '';
	$_lang['kv.label_status']												= 'Status';
	$_lang['kv.label_status_desc']											= '';
	$_lang['kv.label_created']												= 'Posted';
	$_lang['kv.label_created_desc']											= '';
	
	$_lang['kv.filter_status']												= 'Filter on status...';
	$_lang['kv.activate']													= 'Show';
	$_lang['kv.deactivate']													= 'Hide';
	$_lang['kv.time_seconds']												= 'Less than a minute ago';
	$_lang['kv.time_minute']												= '1 minute ago';
	$_lang['kv.time_minutes']												= '[[+minutes]] minutes ago';
	$_lang['kv.time_hour']													= '1 hour ago';
	$_lang['kv.time_hours']													= '[[+hours]] hours ago';
	$_lang['kv.time_day']													= '1 day ago';
	$_lang['kv.time_days']													= '[[+days]] days ago';
	$_lang['kv.time_week']													= '1 week ago';
	$_lang['kv.time_weeks']													= '[[+weeks]] weeks ago';
	$_lang['kv.time_month']													= '1 month ago';
	$_lang['kv.time_months']												= '[[+months]] months ago';
	$_lang['kv.time_to_long']												= 'More than a half year ago';
	$_lang['kv.kv_cronjob_notice_desc']										= '<strong>Reminder:</strong> for Klantenvertellen a cronjob is required to synchronize the reviews all reviews of Klantenvertellen each hour. This notification can turned off in the system settings.';
	
?>