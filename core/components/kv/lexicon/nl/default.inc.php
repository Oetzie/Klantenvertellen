<?php

    /**
     * Klantenvertellen
     *
     * Copyright 2018 by Oene Tjeerd de Bruin <modx@oetzie.nl>
     */
    
    $_lang['kv']                                        = 'Klantenvertellen';
    $_lang['kv.desc']                                   = 'Beheer alle Klantenvertellen beoordelingen.';
    
    $_lang['area_kv']                                   = 'Klantenvertellen';
    
    $_lang['setting_kv.branding_url']                   = 'Branding';
    $_lang['setting_kv.branding_url_desc']              = 'De URL waar de branding knop heen verwijst, indien leeg wordt de branding knop niet getoond.';
    $_lang['setting_kv.branding_url_help']              = 'Branding (help)';
    $_lang['setting_kv.branding_url_help_desc']         = 'De URL waar de branding help knop heen verwijst, indien leeg wordt de branding help knop niet getoond.';
    $_lang['setting_kv.cronjob']                        = 'Cronjob herinnering';
    $_lang['setting_kv.cronjob_desc']                   = 'Zet deze instelling op "Ja" als er een cronjob is ingesteld voor Klantenvertellen, door deze instelling op "Ja" te zetten word er geen cronjob waarschuwing meer getoond.';
    $_lang['setting_kv.account']                        = 'Klantenvertellen account';
    $_lang['setting_kv.account_desc']                   = 'De naam van de Klantenvertellen account.';
    $_lang['setting_kv.api_endpoint']                   = 'Klantenvertellen API URL';
    $_lang['setting_kv.api_endpoint_desc']              = 'De url van de Klantenvertellen API.';
    $_lang['setting_kv.default_active']                 = 'Standaard status';
    $_lang['setting_kv.default_active_desc']            = 'De standaard status van de Klantenvertellen beoordelingen tijdens het synchroniseren van de beoordelingen.';
    $_lang['setting_kv.log_send']                       = 'Log versturen';
    $_lang['setting_kv.log_send_desc']                  = 'Indien ja, het aangemaakte log bestand die automatisch word aangemaakt versturen via e-mail.';
    $_lang['setting_kv.log_email']                      = 'Log e-mailadres(sen)';
    $_lang['setting_kv.log_email_desc']                 = 'De e-mailadres(sen) waar het log bestand heen gestuurd dient te worden. Meerdere e-mailadressen scheiden met een komma.';    
    $_lang['setting_kv.log_lifetime']                   = 'Log levensduur';
    $_lang['setting_kv.log_lifetime_desc']              = 'Het aantal dagen dat een log bestand bewaard moet blijven, hierna word het log bestand automatisch verwijderd.';
    $_lang['setting_kv.summary']                        = 'Klantenvertellen statistieken';
    $_lang['setting_kv.summary_desc']                   = 'De klantenvertellen statistieken, deze statistieken worden gesynchroniseerd tegelijk met de beoordelingen.';
    
    $_lang['kvreviews_snippet_limit_desc']              = 'Het maximaal aantal beoordelingen wat weergegeven moet worden. Standaard is "10".';
    $_lang['kvreviews_snippet_placeholders_desc']       = 'De placeholders voor de beoordelingen. Standaard is "{"total": "reviews.total"}".';
    $_lang['kvreviews_snippet_sort_desc']               = 'De volgorde waarin de beoordelingen weergegeven moeten worden. Standaard is "{"created": "DESC"}".';
    $_lang['kvreviews_snippet_tpl_desc']                = 'De item template voor een review. Standaard is "@FILE:reviewItemTpl".';
    $_lang['kvreviews_snippet_tplwrapper_desc']         = 'De wrapper template voor alle reviews. Standaard is "@FILE:reviewsWrapperTpl".';
    $_lang['kvreviews_snippet_type_desc']               = 'De output type voor de reviews. Dit kan "Array", "Json" of "Html" zijn, standaard is "Html".';
    
    $_lang['kv.review']                                 = 'Beoordeling';
    $_lang['kv.reviews']                                = 'Beoordelingen';
    $_lang['kv.reviews_desc']                           = 'Beheer hier de gesynchroniseerde beoordelingen uit Klantenvertellen. Deze beoordelingen worden ieder uur automatisch gesynchroniseerd vanuit Klantenvertellen met MODX.';
    $_lang['kv.review_activate']                        = 'Beoordeling weergeven';
    $_lang['kv.review_activate_confirm']                = 'Weet je zeker dat je deze beoordeling wilt weergeven?';
    $_lang['kv.review_deactivate']                      = 'Beoordeling verbergen';
    $_lang['kv.review_deactivate_confirm']              = 'Weet je zeker dat je deze beoordeling wilt verbergen?';
    $_lang['kv.reviews_activate_selected']              = 'Geselecteerde beoordelingen weergeven';
    $_lang['kv.reviews_activate_selected_confirm']      = 'Weet je zeker dat je de geselecteerde beoordelingen wilt weergaven?';
    $_lang['kv.reviews_deactivate_selected']            = 'Geselecteerde beoordelingen verbergen';
    $_lang['kv.reviews_deactivate_selected_confirm']    = 'Weet je zeker dat je de geselecteerde beoordelingen wilt verbergen?';
    $_lang['kv.reviews_reset']                          = 'Alle beoordelingen verwijderen';
    $_lang['kv.reviews_reset_confirm']                  = 'Weet je zeker dat je alle beoordelingen wilt verwijderen?';
    
    $_lang['kv.label_name']                             = 'Naam';
    $_lang['kv.label_name_desc']                        = '';
    $_lang['kv.label_city']                             = 'Woonplaats';
    $_lang['kv.label_city_desc']                        = 'D';
    $_lang['kv.label_content']                          = 'Beoordeling';
    $_lang['kv.label_content_desc']                     = '';
    $_lang['kv.label_average']                          = 'Gemiddelde';
    $_lang['kv.label_avarage_desc']                     = '';
    $_lang['kv.label_status']                           = 'Status';
    $_lang['kv.label_status_desc']                      = '';
    $_lang['kv.label_created']                          = 'Geplaatst';
    $_lang['kv.label_created_desc']                     = '';
    
    $_lang['kv.filter_status']                          = 'Filter op status...';
    $_lang['kv.filter_average']                         = 'Filter op gemiddelde...';
    $_lang['kv.average_1']                              = '1 ster';
    $_lang['kv.average_2']                              = '2 sterren of lager';
    $_lang['kv.average_3']                              = '3 sterren of lager';
    $_lang['kv.average_4']                              = '4 sterren of lager';
    $_lang['kv.average_5']                              = '5 sterren of lager';
    $_lang['kv.activate']                               = 'Weergeven';
    $_lang['kv.deactivate']                             = 'Verbergen';
    $_lang['kv.summary_reviews']                        = '[[+total]] beoordelingen';
    $_lang['kv.summary_recommendation']                 = '[[+total]] beveelt [[+name]] aan';
    $_lang['kv.summary_service']                        = 'Service';
    $_lang['kv.summary_expertise']                      = 'Deskundigheid';
    $_lang['kv.summary_price']                          = 'Prijs/kwaliteit';
    $_lang['kv.time_seconds']                           = 'Minder dan 1 minuut geleden';
    $_lang['kv.time_minute']                            = '1 minuut geleden';
    $_lang['kv.time_minutes']                           = '[[+minutes]] minuten geleden';
    $_lang['kv.time_hour']                              = '1 uur geleden';
    $_lang['kv.time_hours']                             = '[[+hours]] uren geleden';
    $_lang['kv.time_day']                               = '1 dag geleden';
    $_lang['kv.time_days']                              = '[[+days]] dagen geleden';
    $_lang['kv.time_week']                              = '1 week geleden';
    $_lang['kv.time_weeks']                             = '[[+weeks]] weken geleden';
    $_lang['kv.time_month']                             = '1 maand geleden';
    $_lang['kv.time_months']                            = '[[+months]] maanden geleden';
    $_lang['kv.time_to_long']                           = 'Meer dan een half jaar geleden';
    $_lang['kv.kv_cronjob_notice_desc']                 = '<strong>Herinnering:</strong> voor Klantenvertellen moet er een cronjob ingesteld zijn die elk uur alle beoordelingen van Klantenvertellen synchroniseert. Deze herinnering kan uit gezet worden via de systeem instellingen.';
    
?>