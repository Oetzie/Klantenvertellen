var KlantenVertellen = function(config) {
    config = config || {};

    KlantenVertellen.superclass.constructor.call(this, config);
};

Ext.extend(KlantenVertellen, Ext.Component, {
    page    : {},
    window  : {},
    grid    : {},
    tree    : {},
    panel   : {},
    combo   : {},
    config  : {}
});

Ext.reg('klantenvertellen', KlantenVertellen);

KlantenVertellen = new KlantenVertellen();