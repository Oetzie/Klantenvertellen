Ext.onReady(function() {
	MODx.load({xtype: 'kv-page-home'});
});

Kv.page.Home = function(config) {
	config = config || {};
	
	config.buttons = [];
	
	if (Kv.config.branding_url) {
		config.buttons.push({
			text 		: 'Klantenvertellen ' + Kv.config.version,
			cls			: 'x-btn-branding',
			handler		: this.loadBranding
		});
	}
	
	if (Kv.config.branding_url_help) {
		config.buttons.push({
			text		: _('help_ex'),
			handler		: MODx.loadHelpPane,
			scope		: this
		});
	}
	
	Ext.applyIf(config, {
		components	: [{
			xtype		: 'kv-panel-home',
			renderTo	: 'kv-panel-home-div'
		}]
	});
	
	Kv.page.Home.superclass.constructor.call(this, config);
};

Ext.extend(Kv.page.Home, MODx.Component, {
	loadBranding: function(btn) {
		window.open(Kv.config.branding_url);
	}
});

Ext.reg('kv-page-home', Kv.page.Home);