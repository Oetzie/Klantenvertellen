var Kv = function(config) {
    config = config || {};
    
    Kv.superclass.constructor.call(this, config);
};

Ext.extend(Kv, Ext.Component, {
    page    : {},
    window  : {},
    grid    : {},
    tree    : {},
    panel   : {},
    combo   : {},
    config  : {}
});

Ext.reg('kv', Kv);

Kv = new Kv();