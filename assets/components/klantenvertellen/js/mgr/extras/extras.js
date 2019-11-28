KlantenVertellen.combo.Status = function(config) {
    config = config || {};

    Ext.applyIf(config, {
        store       : new Ext.data.ArrayStore({
            mode        : 'local',
            fields      : ['type', 'label'],
            data        : [
                ['0', _('klantenvertellen.deactivate')],
                ['1', _('klantenvertellen.activate')]
            ]
        }),
        remoteSort  : ['label', 'asc'],
        hiddenName  : 'active',
        valueField  : 'type',
        displayField : 'label',
        mode        : 'local'
    });

    KlantenVertellen.combo.Status.superclass.constructor.call(this, config);
};

Ext.extend(KlantenVertellen.combo.Status, MODx.combo.ComboBox);

Ext.reg('klantenvertellen-combo-status', KlantenVertellen.combo.Status);

KlantenVertellen.combo.Average = function(config) {
    config = config || {};

    Ext.applyIf(config, {
        store       : new Ext.data.ArrayStore({
        mode        : 'local',
        fields      : ['type', 'label'],
        data        : [
            ['1', _('klantenvertellen.average_1')],
            ['2', _('klantenvertellen.average_2')],
            ['3', _('klantenvertellen.average_3')],
            ['4', _('klantenvertellen.average_4')],
            ['5', _('klantenvertellen.average_5')]
            ]
        }),
        remoteSort  : ['label', 'asc'],
        hiddenName  : 'average',
        valueField  : 'type',
        displayField : 'label',
        mode        : 'local'
    });

    KlantenVertellen.combo.Average.superclass.constructor.call(this, config);
};

Ext.extend(KlantenVertellen.combo.Average, MODx.combo.ComboBox);

Ext.reg('klantenvertellen-combo-average', KlantenVertellen.combo.Average);