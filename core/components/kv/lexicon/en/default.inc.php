<?php

    /**
     * Klantenvertellen
     *
     * Copyright 2018 by Oene Tjeerd de Bruin <modx@oetzie.nl>
     */

    $_lang['kv']                                        = 'Klantenvertellen';
    $_lang['kv.desc']                                   = 'Manage all Klantenvertellen reviews.';
        
    $_lang['area_kv']                                   = 'Klantenvertellen';
    
    $_lang['setting_kv.branding_url']                   = 'Branding';
    $_lang['setting_kv.branding_url_desc']              = 'The URL of the branding button, if the URL is empty the branding button won\'t be shown.';
    $_lang['setting_kv.branding_url_help']              = 'Branding (help)';
    $_lang['setting_kv.branding_url_help_desc']         = 'The URL of the branding help button, if the URL is empty the branding help button won\'t be shown.';
    $_lang['setting_kv.cronjob']                        = 'Cronjob reminder';
    $_lang['setting_kv.cronjob_desc']                   = 'Set this setting to "Yes" if you set up a cronjob for social media, By setting this setting to "Yes" the cronjob notification is no longer displayed.';
    $_lang['setting_kv.account']                        = 'Klantenvertellen account';
    $_lang['setting_kv.account_desc']                   = 'The name of the Klantenvertellen account.';
    $_lang['setting_kv.api_endpoint']                   = 'Klantenvertellen API URL';
    $_lang['setting_kv.api_endpoint_desc']              = 'The url of the Klantenvertellen API.';
    $_lang['setting_kv.default_active']                 = 'Default status';
    $_lang['setting_kv.default_active_desc']            = 'The default status of the reviews during the synchronizing of Klantenvertellen.';
    $_lang['setting_kv.log_send']                       = 'Send log';
    $_lang['setting_kv.log_send_desc']                  = 'When yes, send the log file that will be created by email.';
    $_lang['setting_kv.log_email']                      = 'Log e-mail address(es)';
    $_lang['setting_kv.log_email_desc']                 = 'The e-mail address(es) where the log file needs to be send. Separate e-mail addresses with a comma.';    
    $_lang['setting_kv.log_lifetime']                   = 'Log lifetime';
    $_lang['setting_kv.log_lifetime_desc']              = 'The number of days that a log file needs to be saved, after this the log file will be deleted automatically.';
    $_lang['setting_kv.summary']                        = 'Klantenvertellen stats';
    $_lang['setting_kv.summary_desc']                   = 'De klantenvertellen stats, these stats will be synchronized along with the reviews.';
    
    $_lang['kvreviews_snippet_limit_desc']              = 'The number of reviews that will be shown. Default is "10".';
    $_lang['kvreviews_snippet_placeholders_desc']       = 'The placeholders of the reviews. Default is "{"total": "reviews.total"}".';
    $_lang['kvreviews_snippet_sort_desc']               = 'The sort direction of the social media messages. Default is "{"created": "DESC"}".';
    $_lang['kvreviews_snippet_tpl_desc']                = 'The item template for a review. Default is "@FILE:reviewItemTpl".';
    $_lang['kvreviews_snippet_tplwrapper_desc']         = 'The wrapper template for all reviews. Default is "@FILE:reviewsWrapperTpl".';
    $_lang['kvreviews_snippet_type_desc']               = 'The output type of the reviews. This can be "Array", "Json" or "Html", default is "Html".';
    
    $_lang['kv.review']                                 = 'Review';
    $_lang['kv.reviews']                                = 'Reviews';
    $_lang['kv.reviews_desc']                           = 'Manage here the synchronized reviews of Klantenvertellen. These reviews will synchronized automatically each hour from Klantenvertellen with MODX.';
    $_lang['kv.review_activate']                        = 'Show review';
    $_lang['kv.review_activate_confirm']                = 'Are you sure you want to show this review?';
    $_lang['kv.review_deactivate']                      = 'Hide review';
    $_lang['kv.review_deactivate_confirm']              = 'Are you sure you want to hide this review?';
    $_lang['kv.reviews_activate_selected']              = 'Show selected reviews';
    $_lang['kv.reviews_activate_selected_confirm']      = 'Are you sure you want to show the selected reviews?';
    $_lang['kv.reviews_deactivate_selected']            = 'Hide selected reviews';
    $_lang['kv.reviews_deactivate_selected_confirm']    = 'Are you sure you want to hide the selected reviews?';
    $_lang['kv.reviews_reset']                          = 'Delete all reviews';
    $_lang['kv.reviews_reset_confirm']                  = 'Are you sure you want to delete all the reviews?';
    
    $_lang['kv.label_name']                             = 'Name';
    $_lang['kv.label_name_desc']                        = '';
    $_lang['kv.label_city']                             = 'City';
    $_lang['kv.label_city_desc']                        = '';
    $_lang['kv.label_content']                          = 'Review';
    $_lang['kv.label_content_desc']                     = '';
    $_lang['kv.label_average']                          = 'Average';
    $_lang['kv.label_avarage_desc']                     = '';
    $_lang['kv.label_status']                           = 'Status';
    $_lang['kv.label_status_desc']                      = '';
    $_lang['kv.label_created']                          = 'Posted';
    $_lang['kv.label_created_desc']                     = '';
    
    $_lang['kv.filter_status']                          = 'Filter on status...';
    $_lang['kv.filter_average']                         = 'Filter op gemiddelde...';
    $_lang['kv.average_1']                              = '1 star';
    $_lang['kv.average_2']                              = '2 stars or less';
    $_lang['kv.average_3']                              = '3 stars or less';
    $_lang['kv.average_4']                              = '4 stars or less';
    $_lang['kv.average_5']                              = '5 stars or less';
    $_lang['kv.activate']                               = 'Show';
    $_lang['kv.deactivate']                             = 'Hide';
    $_lang['kv.summary_reviews']                        = '[[+total]] reviews';
    $_lang['kv.summary_recommendation']                 = '[[+total]] recommends [[+name]]';
    $_lang['kv.summary_service']                        = 'Service';
    $_lang['kv.summary_expertise']                      = 'Expertise';
    $_lang['kv.summary_price']                          = 'Price/quality';
    $_lang['kv.time_seconds']                           = 'Less than a minute ago';
    $_lang['kv.time_minute']                            = '1 minute ago';
    $_lang['kv.time_minutes']                           = '[[+minutes]] minutes ago';
    $_lang['kv.time_hour']                              = '1 hour ago';
    $_lang['kv.time_hours']                             = '[[+hours]] hours ago';
    $_lang['kv.time_day']                               = '1 day ago';
    $_lang['kv.time_days']                              = '[[+days]] days ago';
    $_lang['kv.time_week']                              = '1 week ago';
    $_lang['kv.time_weeks']                             = '[[+weeks]] weeks ago';
    $_lang['kv.time_month']                             = '1 month ago';
    $_lang['kv.time_months']                            = '[[+months]] months ago';
    $_lang['kv.time_to_long']                           = 'More than a half year ago';
    $_lang['kv.kv_cronjob_notice_desc']                 = '<strong>Reminder:</strong> for Klantenvertellen a cronjob is required to synchronize the reviews all reviews of Klantenvertellen each hour. This notification can turned off in the system settings.';
    
?>