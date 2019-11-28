KlantenVertellen.grid.Reviews = function(config) {
    config = config || {};

    config.tbar = [{
        text        : _('bulk_actions'),
        menu        : [{
            text        : '<i class="x-menu-item-icon icon icon-eye"></i>' + _('klantenvertellen.reviews_activate_selected'),
            handler     : this.activateSelectedReviews,
            scope       : this
        }, {
            text        : '<i class="x-menu-item-icon icon icon-eye-slash"></i>' + _('klantenvertellen.reviews_deactivate_selected'),
            handler     : this.deactivateSelectedReviews,
            scope       : this
        }, '-', {
            text        : '<i class="x-menu-item-icon icon icon-times"></i>' + _('klantenvertellen.reviews_reset'),
            handler     : this.removeReviews,
            scope       : this
        }]
    }, '->', {
        xtype       : 'klantenvertellen-combo-status',
        name        : 'klantenvertellen-filter-reviews-status',
        id          : 'klantenvertellen-filter-reviews-status',
        emptyText   : _('klantenvertellen.filter_status'),
        listeners   : {
            'select'    : {
                fn          : this.filterStatus,
                scope       : this   
            }
        }
    }, '-', {
        xtype       : 'textfield',
        name        : 'klantenvertellen-filter-reviews-search',
        id          : 'klantenvertellen-filter-reviews-search',
        emptyText   : _('search') + '...',
        listeners   : {
            'change'    : {
                fn          : this.filterSearch,
                scope       : this
            },
            'render'    : {
                fn          : function(cmp) {
                    new Ext.KeyMap(cmp.getEl(), {
                        key     : Ext.EventObject.ENTER,
                        fn      : this.blur,
                        scope   : cmp
                    });
                },
                scope       : this
            }
        }
    }, {
        xtype       : 'button',
        cls         : 'x-form-filter-clear',
        id          : 'klantenvertellen-filter-reviews-clear',
        text        : _('filter_clear'),
        listeners   : {
            'click'     : {
                fn          : this.clearFilter,
                scope       : this
            }
        }
    }];
    
    var sm = new Ext.grid.CheckboxSelectionModel();
    
    var columns = new Ext.grid.ColumnModel({
        columns     : [sm, {
            header      : _('klantenvertellen.label_name'),
            dataIndex   : 'name',
            sortable    : true,
            editable    : false,
            width       : 250,
            fixed       : true
        }, {
            header      : _('klantenvertellen.label_content'),
            dataIndex   : 'content',
            sortable    : true,
            editable    : false,
            width       : 250
        }, {
            header      : _('klantenvertellen.label_average'),
            dataIndex   : 'rating_stars',
            sortable    : true,
            editable    : false,
            width       : 150,
            fixed       : true,
            renderer    : this.renderAvarage
        }, {
            header      : _('klantenvertellen.label_status'),
            dataIndex   : 'active',
            sortable    : true,
            editable    : true,
            width       : 100,
            fixed       : true,
            renderer    : this.renderStatus,
            editor      : {
                xtype       : 'klantenvertellen-combo-status'
            }
        }, {
            header      : _('klantenvertellen.label_created'),
            dataIndex   : 'time_ago',
            sortable    : true,
            editable    : false,
            fixed       : true,
            width       : 200,
            renderer    : this.renderDate
        }]
    });
    
    Ext.applyIf(config, {
        sm          : sm,
        cm          : columns,
        id          : 'klantenvertellen-grid-reviews',
        url         : KlantenVertellen.config.connector_url,
            baseParams  : {
            action      : 'mgr/reviews/getlist'
        },
        autosave    : true,
        save_action : 'mgr/reviews/updatefromgrid',
        fields      : ['id', 'kv_id', 'name', 'city', 'subject', 'content', 'recommendation', 'rating', 'active', 'created', 'rating_stars', 'time_ago'],
        paging      : true,
        pageSize    : MODx.config.default_per_page > 30 ? MODx.config.default_per_page : 30,
        sortBy      : 'created'
    });

    KlantenVertellen.grid.Reviews.superclass.constructor.call(this, config);
};

Ext.extend(KlantenVertellen.grid.Reviews, MODx.grid.Grid, {
    filterAverage: function(tf, nv, ov) {
        this.getStore().baseParams.average = tf.getValue();
        
        this.getBottomToolbar().changePage(1);
    },
    filterStatus: function(tf, nv, ov) {
        this.getStore().baseParams.status = tf.getValue();
        
        this.getBottomToolbar().changePage(1);
    },
    filterSearch: function(tf, nv, ov) {
        this.getStore().baseParams.query = tf.getValue();
        
        this.getBottomToolbar().changePage(1);
    },
    clearFilter: function() {
        this.getStore().baseParams.status   = '';
        this.getStore().baseParams.query    = '';
        
        Ext.getCmp('klantenvertellen-filter-reviews-status').reset();
        Ext.getCmp('klantenvertellen-filter-reviews-search').reset();
        
        this.getBottomToolbar().changePage(1);
    },
    getMenu: function() {
        var menu = [{
            text    : '<i class="x-menu-item-icon icon icon-eye"></i>' + _('klantenvertellen.review_view'),
            handler : this.viewReview,
            scope   : this
        }, '-'];

        if (parseInt(this.menu.record.active) === 1) {
            menu.push({
                text    : '<i class="x-menu-item-icon icon icon-eye-slash"></i>' + _('klantenvertellen.review_deactivate'),
                handler : this.deactivateReview
            });
        } else {
            menu.push({
                text    : '<i class="x-menu-item-icon icon icon-eye"></i>' + _('klantenvertellen.review_activate'),
                handler : this.activateReview
            });
        }
        
        return menu;
    },
    viewReview: function(btn, e) {
        if (this.viewReviewWindow) {
            this.viewReviewWindow.destroy();
        }

        this.viewReviewWindow = MODx.load({
            xtype       : 'klantenvertellen-window-review-view',
            record      : this.menu.record,
            closeAction : 'close',
            buttons     : [{
                text        : _('close'),
                cls         : 'primary-button',
                handler     : function() {
                    this.viewReviewWindow.close();
                },
                scope       : this
            }]
        });

        this.viewReviewWindow.setValues(this.menu.record);
        this.viewReviewWindow.show(e.target);
    },
    activateReview: function(btn, e) {
        MODx.msg.confirm({
            title       : _('klantenvertellen.review_activate'),
            text        : _('klantenvertellen.review_activate_confirm'),
            url         : KlantenVertellen.config.connector_url,
            params      : {
                action      : 'mgr/reviews/update',
                id          : this.menu.record.id,
                active      : 1
            },
            listeners   : {
                'success'   : {
                    fn          : this.refresh,
                    scope       : this
                }
            }
        });
    },
    deactivateReview: function(btn, e) {
        MODx.msg.confirm({
            title       : _('klantenvertellen.review_deactivate'),
            text        : _('klantenvertellen.review_deactivate_confirm'),
            url         : KlantenVertellen.config.connector_url,
            params      : {
                action      : 'mgr/reviews/update',
                id          : this.menu.record.id,
                active      : 0
            },
            listeners   : {
                'success'   : {
                    fn          : this.refresh,
                    scope       : this
                }
            }
        });
    },
    activateSelectedReviews: function(btn, e) {
        var cs = this.getSelectedAsList();

        MODx.msg.confirm({
            title       : _('klantenvertellen.reviews_activate_selected'),
            text        : _('klantenvertellen.reviews_activate_selected_confirm'),
            url         : KlantenVertellen.config.connector_url,
            params      : {
                action      : 'mgr/reviews/activateselected',
                type        : 1,
                ids         : cs
            },
            listeners   : {
                'success'   : {
                    fn          : function() {
                        this.getSelectionModel().clearSelections(true);
                        
                        this.refresh();
                    },
                    scope       : this
                }
            }
        });
    },
    deactivateSelectedReviews: function(btn, e) {
        var cs = this.getSelectedAsList();

        MODx.msg.confirm({
            title       : _('klantenvertellen.reviews_deactivate_selected'),
            text        : _('klantenvertellen.reviews_deactivate_selected_confirm'),
            url         : KlantenVertellen.config.connector_url,
            params      : {
                action      : 'mgr/reviews/activateselected',
                type        : 0,
                ids         : cs
            },
            listeners   : {
                'success'   : {
                    fn          : function() {
                        this.getSelectionModel().clearSelections(true);

                        this.refresh();
                    },
                    scope       : this
                }
            }
        });
    },
    removeReviews: function(btn, e) {
        MODx.msg.confirm({
            title       : _('klantenvertellen.reviews_reset'),
            text        : _('klantenvertellen.reviews_reset_confirm'),
            url         : KlantenVertellen.config.connector_url,
            params      : {
                action      : 'mgr/reviews/remove'
            },
            listeners   : {
                'success'   : {
                    fn          : this.refresh,
                    scope       : this
                }
            }
        });
    },
    renderAvarage: function(d, c, e) {
        var stars   = [],
            average = d.toString().split('.');
        
        for (var i = 0; i < 5; i++) {
            if (i < parseInt(average[0])) {
                stars.push('<i class="icon icon-star"></i>');
            } else {
                if (parseInt(average[0]) === i && undefined !== average[1]) {
                    stars.push('<i class="icon icon-star-half-o"></i>');
                } else {
                    stars.push('<i class="icon icon-star-o"></i>');
                }
            }
        }
        
        return stars.join(' ') + ' <span class="klantenvertellen-grid-avarage">(' + e.data.rating + ')</span>';
    },
    renderStatus: function(d, c) {
        c.css = parseInt(d) === 1 ? 'green' : 'red';
        
        return parseInt(d) === 1 ? _('klantenvertellen.activate') : _('klantenvertellen.deactivate');
    },
    renderDate: function(a) {
        if (Ext.isEmpty(a)) {
            return '—';
        }
        
        return a;
    }
});

Ext.reg('klantenvertellen-grid-reviews', KlantenVertellen.grid.Reviews);

KlantenVertellen.window.ViewReview = function(config) {
    config = config || {};

    Ext.applyIf(config, {
        width       : 600,
        autoHeight  : true,
        title       : _('klantenvertellen.review_view'),
        fields      : [{
            xtype       : 'statictextfield',
            fieldLabel  : _('klantenvertellen.label_name'),
            anchor      : '100%',
            value       : _('klantenvertellen.label_author', {
                name        : config.record.name,
                city        : config.record.city || _('klantenvertellen.unknown')
            })
        }, {
            xtype       : 'statictextfield',
            fieldLabel  : _('klantenvertellen.label_subject'),
            anchor      : '100%',
            value       : config.record.subject
        }, {
            xtype       : 'textarea',
            fieldLabel  : _('klantenvertellen.label_content'),
            anchor      : '100%',
            value       : config.record.content,
            fieldClass  : 'x-static-text-field',
            readOnly    : true
        }, {
            xtype       : 'statictextfield',
            fieldLabel  : _('klantenvertellen.summary_recommendation_small'),
            anchor      : '100%',
            value       : parseInt(config.record.recommendation) === 1 ? _('yes') : _('no')
        }]
    });

    KlantenVertellen.window.ViewReview.superclass.constructor.call(this, config);
};

Ext.extend(KlantenVertellen.window.ViewReview, MODx.Window);

Ext.reg('klantenvertellen-window-review-view', KlantenVertellen.window.ViewReview);