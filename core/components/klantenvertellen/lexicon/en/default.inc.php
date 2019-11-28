<?php

/**
 * Klantenvertellen
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

$_lang['klantenvertellen']                                      = 'Klantenvertellen';
$_lang['klantenvertellen.desc']                                 = 'Manage all Klantenvertellen reviews.';

$_lang['area_klantenvertellen']                                 = 'Klantenvertellen';

$_lang['setting_klantenvertellen.branding_url']                 = 'Branding';
$_lang['setting_klantenvertellen.branding_url_desc']            = 'The URL of the branding button, if the URL is empty the branding button won\'t be shown.';
$_lang['setting_klantenvertellen.branding_url_help']            = 'Branding (help)';
$_lang['setting_klantenvertellen.branding_url_help_desc']       = 'The URL of the branding help button, if the URL is empty the branding help button won\'t be shown.';
$_lang['setting_klantenvertellen.cronjob']                      = 'Cronjob reminder';
$_lang['setting_klantenvertellen.cronjob_desc']                 = 'Set this setting to "Yes" if you set up a cronjob for social media, By setting this setting to "Yes" the cronjob notification is no longer displayed.';
$_lang['setting_klantenvertellen.api_endpoint']                 = 'Klantenvertellen API V1 URL';
$_lang['setting_klantenvertellen.api_endpoint_desc']            = 'The url of the Klantenvertellen API V1.';
$_lang['setting_klantenvertellen.default_active']               = 'Default status';
$_lang['setting_klantenvertellen.default_active_desc']          = 'The default status of the reviews during the synchronizing of Klantenvertellen.';
$_lang['setting_klantenvertellen.log_send']                     = 'Send log';
$_lang['setting_klantenvertellen.log_send_desc']                = 'When yes, send the log file that will be created by email.';
$_lang['setting_klantenvertellen.log_email']                    = 'Log e-mail address(es)';
$_lang['setting_klantenvertellen.log_email_desc']               = 'The e-mail address(es) where the log file needs to be send. Separate e-mail addresses with a comma.';
$_lang['setting_klantenvertellen.log_lifetime']                 = 'Log lifetime';
$_lang['setting_klantenvertellen.log_lifetime_desc']            = 'The number of days that a log file needs to be saved, after this the log file will be deleted automatically.';
$_lang['setting_klantenvertellen.cronjob_hash']                 = 'Cronjob hash';
$_lang['setting_klantenvertellen.cronjob_hash_desc']            = 'The hash of the cronjob, this hash needs to be send as a parameter with the cronjob.';
$_lang['setting_klantenvertellen.summary']                      = 'Klantenvertellen stats';
$_lang['setting_klantenvertellen.summary_desc']                 = 'De klantenvertellen stats, these stats will be synchronized along with the reviews.';

$_lang['klantenvertellen.review']                               = 'Review';
$_lang['klantenvertellen.reviews']                              = 'Reviews';
$_lang['klantenvertellen.reviews_desc']                         = 'Manage here the synchronized reviews of Klantenvertellen. These reviews will synchronized automatically each hour from Klantenvertellen with MODX.';
$_lang['klantenvertellen.review_view']                          = 'View review';
$_lang['klantenvertellen.review_activate']                      = 'Show review';
$_lang['klantenvertellen.review_activate_confirm']              = 'Are you sure you want to show this review?';
$_lang['klantenvertellen.review_deactivate']                    = 'Hide review';
$_lang['klantenvertellen.review_deactivate_confirm']            = 'Are you sure you want to hide this review?';
$_lang['klantenvertellen.reviews_activate_selected']            = 'Show selected reviews';
$_lang['klantenvertellen.reviews_activate_selected_confirm']    = 'Are you sure you want to show the selected reviews?';
$_lang['klantenvertellen.reviews_deactivate_selected']          = 'Hide selected reviews';
$_lang['klantenvertellen.reviews_deactivate_selected_confirm']  = 'Are you sure you want to hide the selected reviews?';
$_lang['klantenvertellen.reviews_reset']                        = 'Delete all reviews';
$_lang['klantenvertellen.reviews_reset_confirm']                = 'Are you sure you want to delete all the reviews?';

$_lang['klantenvertellen.label_name']                           = 'Name';
$_lang['klantenvertellen.label_name_desc']                      = '';
$_lang['klantenvertellen.label_city']                           = 'City';
$_lang['klantenvertellen.label_city_desc']                      = '';
$_lang['klantenvertellen.label_subject']                        = 'Subject';
$_lang['klantenvertellen.label_subject_desc']                   = '';
$_lang['klantenvertellen.label_content']                        = 'Review';
$_lang['klantenvertellen.label_content_desc']                   = '';
$_lang['klantenvertellen.label_average']                        = 'Average';
$_lang['klantenvertellen.label_avarage_desc']                   = '';
$_lang['klantenvertellen.label_status']                         = 'Status';
$_lang['klantenvertellen.label_status_desc']                    = '';
$_lang['klantenvertellen.label_created']                        = 'Posted';
$_lang['klantenvertellen.label_created_desc']                   = '';

$_lang['klantenvertellen.filter_status']                        = 'Filter on status...';
$_lang['klantenvertellen.filter_average']                       = 'Filter on average...';
$_lang['klantenvertellen.average_1']                            = '1 star';
$_lang['klantenvertellen.average_2']                            = '2 stars or less';
$_lang['klantenvertellen.average_3']                            = '3 stars or less';
$_lang['klantenvertellen.average_4']                            = '4 stars or less';
$_lang['klantenvertellen.average_5']                            = '5 stars or less';
$_lang['klantenvertellen.activate']                             = 'Show';
$_lang['klantenvertellen.deactivate']                           = 'Hide';
$_lang['klantenvertellen.unknown']                              = 'Unknown';
$_lang['klantenvertellen.label_author']                         = '[[+name]] from [[+city]]';
$_lang['klantenvertellen.summary_reviews']                      = '[[+total]] reviews';
$_lang['klantenvertellen.summary_recommendation']               = '[[+total]]% recommends [[+name]].';
$_lang['klantenvertellen.summary_recommendation_small']         = 'Recommendation';
$_lang['klantenvertellen.time_seconds']                         = 'Less than a minute ago';
$_lang['klantenvertellen.time_minute']                          = '1 minute ago';
$_lang['klantenvertellen.time_minutes']                         = '[[+minutes]] minutes ago';
$_lang['klantenvertellen.time_hour']                            = '1 hour ago';
$_lang['klantenvertellen.time_hours']                           = '[[+hours]] hours ago';
$_lang['klantenvertellen.time_day']                             = '1 day ago';
$_lang['klantenvertellen.time_days']                            = '[[+days]] days ago';
$_lang['klantenvertellen.time_week']                            = '1 week ago';
$_lang['klantenvertellen.time_weeks']                           = '[[+weeks]] weeks ago';
$_lang['klantenvertellen.time_month']                           = '1 month ago';
$_lang['klantenvertellen.time_months']                          = '[[+months]] months ago';
$_lang['klantenvertellen.time_to_long']                         = 'More than a half year ago';
$_lang['klantenvertellen.no_reviews']                           = 'There no reviews available.';
$_lang['klantenvertellen.klantenvertellen_cronjob_notice_desc'] = '<strong>Reminder:</strong> for Klantenvertellen a cronjob is required to synchronize the reviews all reviews of Klantenvertellen each hour. This notification can turned off in the system settings.';
