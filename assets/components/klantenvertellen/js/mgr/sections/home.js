Ext.onReady(function() {
    MODx.load({
        xtype : 'klantenvertellen-page-home'
    });
});

KlantenVertellen.page.Home = function(config) {
    config = config || {};
    
    config.buttons = [];
    
    if (KlantenVertellen.config.branding_url) {
        config.buttons.push({
            text        : 'Klantenvertellen ' + KlantenVertellen.config.version,
            cls         : 'x-btn-branding',
            handler     : this.loadBranding
        });
    }
    
    if (KlantenVertellen.config.branding_url_help) {
        config.buttons.push({
            text        : _('help_ex'),
            handler     : MODx.loadHelpPane,
            scope       : this
        });
    }
    
    Ext.applyIf(config, {
        components  : [{
            xtype       : 'klantenvertellen-panel-home',
            renderTo    : 'klantenvertellen-panel-home-div'
        }]
    });

    KlantenVertellen.page.Home.superclass.constructor.call(this, config);
};

Ext.extend(KlantenVertellen.page.Home, MODx.Component, {
    loadBranding: function(btn) {
        window.open(Kv.config.branding_url);
    }
});

Ext.reg('klantenvertellen-page-home', KlantenVertellen.page.Home);