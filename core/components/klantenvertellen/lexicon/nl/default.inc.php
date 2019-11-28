<?php

/**
 * Klantenvertellen
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

$_lang['klantenvertellen']                                      = 'Klantenvertellen';
$_lang['klantenvertellen.desc']                                 = 'Beheer alle Klantenvertellen beoordelingen.';

$_lang['area_klantenvertellen']                                 = 'Klantenvertellen';

$_lang['setting_klantenvertellen.branding_url']                 = 'Branding';
$_lang['setting_klantenvertellen.branding_url_desc']            = 'De URL waar de branding knop heen verwijst, indien leeg wordt de branding knop niet getoond.';
$_lang['setting_klantenvertellen.branding_url_help']            = 'Branding (help)';
$_lang['setting_klantenvertellen.branding_url_help_desc']       = 'De URL waar de branding help knop heen verwijst, indien leeg wordt de branding help knop niet getoond.';
$_lang['setting_klantenvertellen.cronjob']                      = 'Cronjob herinnering';
$_lang['setting_klantenvertellen.cronjob_desc']                 = 'Zet deze instelling op "Ja" als er een cronjob is ingesteld voor Klantenvertellen, door deze instelling op "Ja" te zetten word er geen cronjob waarschuwing meer getoond.';
$_lang['setting_klantenvertellen.api_endpoint']                 = 'Klantenvertellen API V1 URL';
$_lang['setting_klantenvertellen.api_endpoint_desc']            = 'De url van de Klantenvertellen API V1.';
$_lang['setting_klantenvertellen.default_active']               = 'Standaard status';
$_lang['setting_klantenvertellen.default_active_desc']          = 'De standaard status van de Klantenvertellen beoordelingen tijdens het synchroniseren van de beoordelingen.';
$_lang['setting_klantenvertellen.log_send']                     = 'Log versturen';
$_lang['setting_klantenvertellen.log_send_desc']                = 'Indien ja, het aangemaakte log bestand die automatisch word aangemaakt versturen via e-mail.';
$_lang['setting_klantenvertellen.log_email']                    = 'Log e-mailadres(sen)';
$_lang['setting_klantenvertellen.log_email_desc']               = 'De e-mailadres(sen) waar het log bestand heen gestuurd dient te worden. Meerdere e-mailadressen scheiden met een komma.';
$_lang['setting_klantenvertellen.log_lifetime']                 = 'Log levensduur';
$_lang['setting_klantenvertellen.log_lifetime_desc']            = 'Het aantal dagen dat een log bestand bewaard moet blijven, hierna word het log bestand automatisch verwijderd.';
$_lang['setting_klantenvertellen.cronjob_hash']                 = 'Cronjob hash';
$_lang['setting_klantenvertellen.cronjob_hash_desc']            = 'De hash van de cronjob, deze hash dient als parameter mee gegeven te worden met de cronjob.';
$_lang['setting_klantenvertellen.summary']                      = 'Klantenvertellen statistieken';
$_lang['setting_klantenvertellen.summary_desc']                 = 'De klantenvertellen statistieken, deze statistieken worden gesynchroniseerd tegelijk met de beoordelingen.';

$_lang['klantenvertellen.review']                               = 'Beoordeling';
$_lang['klantenvertellen.reviews']                              = 'Beoordelingen';
$_lang['klantenvertellen.reviews_desc']                         = 'Beheer hier de gesynchroniseerde beoordelingen uit Klantenvertellen. Deze beoordelingen worden ieder uur automatisch gesynchroniseerd vanuit Klantenvertellen met MODX.';
$_lang['klantenvertellen.review_view']                          = 'Beoordeling bekijken';
$_lang['klantenvertellen.review_activate']                      = 'Beoordeling weergeven';
$_lang['klantenvertellen.review_activate_confirm']              = 'Weet je zeker dat je deze beoordeling wilt weergeven?';
$_lang['klantenvertellen.review_deactivate']                    = 'Beoordeling verbergen';
$_lang['klantenvertellen.review_deactivate_confirm']            = 'Weet je zeker dat je deze beoordeling wilt verbergen?';
$_lang['klantenvertellen.reviews_activate_selected']            = 'Geselecteerde beoordelingen weergeven';
$_lang['klantenvertellen.reviews_activate_selected_confirm']    = 'Weet je zeker dat je de geselecteerde beoordelingen wilt weergaven?';
$_lang['klantenvertellen.reviews_deactivate_selected']          = 'Geselecteerde beoordelingen verbergen';
$_lang['klantenvertellen.reviews_deactivate_selected_confirm']  = 'Weet je zeker dat je de geselecteerde beoordelingen wilt verbergen?';
$_lang['klantenvertellen.reviews_reset']                        = 'Alle beoordelingen verwijderen';
$_lang['klantenvertellen.reviews_reset_confirm']                = 'Weet je zeker dat je alle beoordelingen wilt verwijderen?';

$_lang['klantenvertellen.label_name']                           = 'Naam';
$_lang['klantenvertellen.label_name_desc']                      = '';
$_lang['klantenvertellen.label_city']                           = 'Woonplaats';
$_lang['klantenvertellen.label_city_desc']                      = '';
$_lang['klantenvertellen.label_subject']                        = 'Onderwerp';
$_lang['klantenvertellen.label_subject_desc']                   = '';
$_lang['klantenvertellen.label_content']                        = 'Beoordeling';
$_lang['klantenvertellen.label_content_desc']                   = '';
$_lang['klantenvertellen.label_average']                        = 'Gemiddelde';
$_lang['klantenvertellen.label_avarage_desc']                   = '';
$_lang['klantenvertellen.label_status']                         = 'Status';
$_lang['klantenvertellen.label_status_desc']                    = '';
$_lang['klantenvertellen.label_created']                        = 'Geplaatst';
$_lang['klantenvertellen.label_created_desc']                   = '';

$_lang['klantenvertellen.filter_status']                        = 'Filter op status...';
$_lang['klantenvertellen.filter_average']                       = 'Filter op gemiddelde...';
$_lang['klantenvertellen.average_1']                            = '1 ster';
$_lang['klantenvertellen.average_2']                            = '2 sterren of lager';
$_lang['klantenvertellen.average_3']                            = '3 sterren of lager';
$_lang['klantenvertellen.average_4']                            = '4 sterren of lager';
$_lang['klantenvertellen.average_5']                            = '5 sterren of lager';
$_lang['klantenvertellen.activate']                             = 'Weergeven';
$_lang['klantenvertellen.deactivate']                           = 'Verbergen';
$_lang['klantenvertellen.unknown']                              = 'Onbekend';
$_lang['klantenvertellen.label_author']                         = '[[+name]] uit [[+city]]';
$_lang['klantenvertellen.summary_reviews']                      = '[[+total]] beoordelingen';
$_lang['klantenvertellen.summary_recommendation']               = '[[+total]]% beveelt [[+name]] aan.';
$_lang['klantenvertellen.summary_recommendation_small']         = 'Aanbeveling';
$_lang['klantenvertellen.time_seconds']                         = 'Minder dan 1 minuut geleden';
$_lang['klantenvertellen.time_minute']                          = '1 minuut geleden';
$_lang['klantenvertellen.time_minutes']                         = '[[+minutes]] minuten geleden';
$_lang['klantenvertellen.time_hour']                            = '1 uur geleden';
$_lang['klantenvertellen.time_hours']                           = '[[+hours]] uren geleden';
$_lang['klantenvertellen.time_day']                             = '1 dag geleden';
$_lang['klantenvertellen.time_days']                            = '[[+days]] dagen geleden';
$_lang['klantenvertellen.time_week']                            = '1 week geleden';
$_lang['klantenvertellen.time_weeks']                           = '[[+weeks]] weken geleden';
$_lang['klantenvertellen.time_month']                           = '1 maand geleden';
$_lang['klantenvertellen.time_months']                          = '[[+months]] maanden geleden';
$_lang['klantenvertellen.time_to_long']                         = 'Meer dan een half jaar geleden';
$_lang['klantenvertellen.no_reviews']                           = 'Er zijn geen beoordelingen.';
$_lang['klantenvertellen.klantenvertellen_cronjob_notice_desc'] = '<strong>Herinnering:</strong> voor Klantenvertellen moet er een cronjob ingesteld zijn die elk uur alle beoordelingen van Klantenvertellen synchroniseert. Deze herinnering kan uit gezet worden via de systeem instellingen.';
