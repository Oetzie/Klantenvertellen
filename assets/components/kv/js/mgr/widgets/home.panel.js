Kv.panel.Home = function(config) {
	config = config || {};
	
    Ext.apply(config, {
        id			: 'kv-panel-home',
        cls			: 'container',
        items		: [{
            html		: '<h2>' + _('kv') + '</h2>',
            id			: 'kv-header',
            cls			: 'modx-page-header'
        }, {
        	layout		: 'form',
            items		: [{
            	html			: '<span class="logo-kv"></span><p>' + _('kv.reviews_desc') + '</p>',
                bodyCssClass	: 'panel-desc'
            }, {
	            html			: 0 == parseInt(MODx.config['kv.cronjob']) ? '<p>' + _('kv.kv_cronjob_notice_desc') + '</p>' : '',
				cls				: 0 == parseInt(MODx.config['kv.cronjob']) ? 'modx-config-error panel-desc' : ''
            }, {
                xtype			: 'kv-grid-reviews',
                cls				: 'main-wrapper',
                preventRender	: true
            }]
        }]
    });

	Kv.panel.Home.superclass.constructor.call(this, config);
};

Ext.extend(Kv.panel.Home, MODx.FormPanel);

Ext.reg('kv-panel-home', Kv.panel.Home);