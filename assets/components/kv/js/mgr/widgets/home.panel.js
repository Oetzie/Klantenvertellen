Kv.panel.Home = function(config) {
    config = config || {};
    
    Ext.apply(config, {
        id          : 'kv-panel-home',
        cls         : 'container',
        items       : [{
            html        : '<h2>' + _('kv') + '</h2>',
            cls         : 'modx-page-header'
        }, {
            layout      : 'form',
            items       : [{
                bodyCssClass    : 'panel-desc',
                items           : [{
                    layout      : 'column',
                    items       : [{
                        columnWidth : .5,
                        items       : [{
                            html            : '<span class="logo-kv"></span><p>' + _('kv.reviews_desc') + '</p>'
                        }]
                    }, {
                        columnWidth : .5,
                        cls         : 'kv-summary',
                        items       : [{
                            layout      : 'column',
                            items       : [{
                                columnWidth : .3,
                                items       : [{
                                    autoEl      : {
                                        tag         : 'div',
                                        html        : '<span class="kv-summary-total">' + (Kv.config.summary.total || 'N/A') + '</span><span class="kv-summary-reviews">' + _('kv.summary_reviews', {
                                            total       : Kv.config.summary.reviews || 'N/A'
                                        }) + '</span>'
                                    }
                                }]
                            }, {
                                columnWidth : .4,
                                items       : [{
                                    autoEl      : {
                                        tag         : 'div',
                                        html        : '<span class="kv-summary-label">' + _('kv.summary_service') + '</span><span class="kv-summary-report">' + (Kv.config.summary.service || 'N/A') + '</span>'
                                    }
                                }, {
                                    autoEl      : {
                                        tag         : 'div',
                                        html        : '<span class="kv-summary-label">' + _('kv.summary_expertise') + '</span><span class="kv-summary-report">' + (Kv.config.summary.expertise || 'N/A') + '</span>'
                                    }
                                }, {
                                    autoEl      : {
                                        tag         : 'div',
                                        html        : '<span class="kv-summary-label">' + _('kv.summary_price') + '</span><span class="kv-summary-report">' + (Kv.config.summary.price || 'N/A') + '</span>'
                                    }
                                }, {
                                    autoEl      : {
                                        tag         : 'div',
                                        html        : '<span class="kv-summary-recommendation">' + _('kv.summary_recommendation', {
                                            total       : Kv.config.summary.recommendations || 'N/A',
                                            name        : Kv.config.account
                                        }) + '</span>'
                                    }
                                }]
                            }, {
                                columnWidth : .3,
                                items       : [{
                                    autoEl      : {
                                        tag         : 'div',
                                        html        : '<span class="kv-summary-logo"><img src="/assets/components/kv/img/mgr/logo.png" /></span>'
                                    }
                                }]
                            }]
                        }]
                    }]
                }]
            }, {
                autoEl          : {
                    tag             : 'div',
                    cls             : 'panel-desc-error',
                    html            : '<p>' + _('kv.kv_cronjob_notice_desc') + '</p>'
                },
                hidden          : 0 === parseInt(MODx.config['kv.cronjob']) ? false : true
            }, {
                xtype           : 'kv-grid-reviews',
                cls             : 'main-wrapper',
                preventRender   : true
            }]
        }]
    });
    
    Kv.panel.Home.superclass.constructor.call(this, config);
};

Ext.extend(Kv.panel.Home, MODx.FormPanel);

Ext.reg('kv-panel-home', Kv.panel.Home);