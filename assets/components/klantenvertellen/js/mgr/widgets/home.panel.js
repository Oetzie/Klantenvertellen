KlantenVertellen.panel.Home = function(config) {
    config = config || {};
    
    Ext.apply(config, {
        id          : 'klantenvertellen-panel-home',
        cls         : 'container',
        items       : [{
            html        : '<h2>' + _('klantenvertellen') + '</h2>',
            cls         : 'modx-page-header'
        }, {
            layout      : 'form',
            items       : [{
                bodyCssClass    : 'panel-desc',
                items           : [{
                    layout      : 'column',
                    items       : [{
                        columnWidth : .7,
                        items       : [{
                            html        : '<p>' + _('klantenvertellen.reviews_desc') + '</p>'
                        }]
                    }, {
                        columnWidth : .3,
                        cls         : 'klantenvertellen-summary',
                        items       : [{
                            layout      : 'column',
                            items       : [{
                                columnWidth : .4,
                                items       : [{
                                    autoEl      : {
                                        tag         : 'div',
                                        html        : '<span class="klantenvertellen-summary-total">' + (KlantenVertellen.config.summary.rating || 'N/A') + '</span><span class="klantenvertellen-summary-reviews">' + _('klantenvertellen.summary_reviews', {
                                            total       : KlantenVertellen.config.summary.reviews || 'N/A'
                                        }) + '</span>'
                                    }
                                }]
                            }, {
                                columnWidth : .6,
                                items       : [{
                                    autoEl      : {
                                        tag         : 'div',
                                        html        : '<span class="klantenvertellen-summary-recommendation">' + _('klantenvertellen.summary_recommendation', {
                                            total       : (KlantenVertellen.config.summary.recommendations || 'N/A') + '%',
                                            name        : KlantenVertellen.config.summary.name
                                        }) + '</span>'
                                    }
                                }]
                            }]
                        }]
                    }]
                }]
            }, {
                html            : '<p>' + _('klantenvertellen.klantenvertellen_cronjob_notice_desc') + '</p>',
                cls             : 'modx-config-error panel-desc',
                hidden          : KlantenVertellen.config.cronjob
            }, {
                xtype           : 'klantenvertellen-grid-reviews',
                cls             : 'main-wrapper',
                preventRender   : true
            }]
        }]
    });
    
    KlantenVertellen.panel.Home.superclass.constructor.call(this, config);
};

Ext.extend(KlantenVertellen.panel.Home, MODx.FormPanel);

Ext.reg('klantenvertellen-panel-home', KlantenVertellen.panel.Home);