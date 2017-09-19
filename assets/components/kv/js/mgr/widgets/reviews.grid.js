Kv.grid.Reviews = function(config) {
    config = config || {};

	config.tbar = [{
		text		: _('bulk_actions'),
		menu		: [{
			text		: _('kv.reviews_activate_selected'),
			type		: true,
			handler		: this.activateSelectedReviews,
			scope		: this
		}, {
			text		: _('kv.reviews_deactivate_selected'),
			type		: false,
			handler		: this.activateSelectedReviews,
			scope		: this
		}, '-', {
			text		: _('kv.reviews_reset'),
			handler		: this.resetReviews,
			scope		: this
		}]
	}, '->', {
    	xtype		: 'kv-combo-status',
    	name		: 'kv-filter-status',
        id			: 'kv-filter-status',
        emptyText	: _('kv.filter_status'),
        listeners	: {
        	'select'	: {
	            fn			: this.filterStatus,
	            scope		: this   
		    }
		}
    }, '-', {
        xtype		: 'textfield',
        name 		: 'kv-filter-search',
        id			: 'kv-filter-search',
        emptyText	: _('search')+'...',
        listeners	: {
	        'change'	: {
	        	fn			: this.filterSearch,
	        	scope		: this
	        },
	        'render'	: {
		        fn			: function(cmp) {
			        new Ext.KeyMap(cmp.getEl(), {
				        key		: Ext.EventObject.ENTER,
			        	fn		: this.blur,
				        scope	: cmp
			        });
		        },
		        scope		: this
	        }
        }
    }, {
    	xtype		: 'button',
    	cls			: 'x-form-filter-clear',
    	id			: 'kv-filter-clear',
    	text		: _('filter_clear'),
    	listeners	: {
        	'click'		: {
        		fn			: this.clearFilter,
        		scope		: this
        	}
        }
    }];
    
    sm = new Ext.grid.CheckboxSelectionModel();
    
    columns = new Ext.grid.ColumnModel({
        columns: [sm, {
            header		: _('kv.label_name'),
            dataIndex	: 'name',
            sortable	: true,
            editable	: false,
            width		: 250,
            fixed 		: true
        }, {
            header		: _('kv.label_content'),
            dataIndex	: 'content',
            sortable	: true,
            editable	: false,
            width		: 250
        }, {
            header		: _('kv.label_average'),
            dataIndex	: 'avarage_stars',
            sortable	: true,
            editable	: false,
            width		: 150,
            fixed		: true,
            renderer	: this.renderAvarage
        }, {
            header		: _('kv.label_status'),
            dataIndex	: 'active',
            sortable	: true,
            editable	: false,
            width		: 100,
            fixed		: true,
			renderer	: this.renderStatus
        }, {
            header		: _('kv.label_created'),
            dataIndex	: 'time_ago',
            sortable	: true,
            editable	: false,
            fixed		: true,
			width		: 200,
			renderer	: this.renderDate
        }]
    });
    
    Ext.applyIf(config, {
	    sm 			: sm,
    	cm			: columns,
        id			: 'kv-grid-reviews',
        url			: Kv.config.connector_url,
        baseParams	: {
        	action		: 'mgr/reviews/getlist'
        },
        fields		: ['id', 'kv_id', 'name', 'city', 'subject', 'content', 'recommendation', 'service', 'expertise', 'price', 'active', 'created', 'average', 'avarage_stars', 'time_ago'],
        paging		: true,
        pageSize	: MODx.config.default_per_page > 30 ? MODx.config.default_per_page : 30,
        sortBy		: 'created'
    });
    
    Kv.grid.Reviews.superclass.constructor.call(this, config);
};

Ext.extend(Kv.grid.Reviews, MODx.grid.Grid, {
	filterStatus: function(tf, nv, ov) {
        this.getStore().baseParams.status = tf.getValue();
        
        this.getBottomToolbar().changePage(1);
    },
    filterSearch: function(tf, nv, ov) {
        this.getStore().baseParams.query = tf.getValue();
        
        this.getBottomToolbar().changePage(1);
    },
    clearFilter: function() {
	    this.getStore().baseParams.status = '';
	    this.getStore().baseParams.query = '';

		Ext.getCmp('kv-filter-status').reset();
	    Ext.getCmp('kv-filter-search').reset();
	    
        this.getBottomToolbar().changePage(1);
    },
    getMenu: function() {
	    var menu = [];
	    
		if (1 == parseInt(this.menu.record.active) || this.menu.record.active) {
			menu.push({
		    	text	: _('kv.review_deactivate'),
				handler	: this.deactivateReview
			});
		} else {
			menu.push({
		    	text	: _('kv.review_activate'),
				handler	: this.activateReview
			});
		}
		
		return menu;
    },
    activateReview: function(btn, e) {
    	MODx.msg.confirm({
        	title 		: _('kv.review_activate'),
        	text		: _('kv.review_activate_confirm'),
        	url			: Kv.config.connector_url,
        	params		: {
            	action		: 'mgr/reviews/update',
            	id			: this.menu.record.id,
            	active 		: 1
            },
            listeners	: {
            	'success'	: {
            		fn			: this.refresh,
            		scope		: this
            	}
            }
    	});
    },
    deactivateReview: function(btn, e) {
    	MODx.msg.confirm({
        	title 		: _('kv.review_deactivate'),
        	text		: _('kv.review_deactivate_confirm'),
        	url			: Kv.config.connector_url,
        	params		: {
            	action		: 'mgr/reviews/update',
            	id			: this.menu.record.id,
            	active 		: 0
            },
            listeners	: {
            	'success'	: {
            		fn			: this.refresh,
            		scope		: this
            	}
            }
    	});
    },
    activateSelectedReviews: function(btn, e) {
    	var cs = this.getSelectedAsList();
    	
        if (cs === false) {
        	return false;
        }
        
        if (btn.type) {
	        var data = {
		    	title	: _('kv.reviews_activate_selected'),
		    	text	: _('kv.reviews_activate_selected_confirm')
	        };
	    } else {
		    var data = {
		    	title	: _('kv.reviews_deactivate_selected'),
		    	text	: _('kv.reviews_deactivate_selected_confirm')
	        };
		}
		
        MODx.msg.confirm({
        	title 		: data.title,
        	text		: data.text,
        	url			: Kv.config.connector_url,
        	params		: {
            	action		: 'mgr/reviews/activateselected',
            	type		: btn.type ? 1 : 0,
            	ids			: cs
            },
            listeners	: {
            	'success'	: {
            		fn			: function() {
	            		this.getSelectionModel().clearSelections(true);
      
						this.refresh();
            		},
            		scope		: this
            	}
            }
    	});
    },
    resetReviews: function(btn, e) {
    	MODx.msg.confirm({
        	title 		: _('kv.reviews_reset'),
        	text		: _('kv.reviews_reset_confirm'),
        	url			: Kv.config.connector_url,
        	params		: {
            	action		: 'mgr/reviews/reset'
            },
            listeners	: {
            	'success'	: {
            		fn			: this.refresh,
            		scope		: this
            	}
            }
    	});
    },
    renderAvarage: function(d, c, e) {
		var stars 	= [],
			average	= d.toString().split('.');

		for (var i = 0; i < 5; i++) {
			if (i < parseInt(average[0])) {
				stars.push('<i class="icon icon-star"></i>');
			} else {
				if (i == parseInt(average[0]) && undefined !== average[1]) {
					stars.push('<i class="icon icon-star-half-o"></i>');
				} else {
					stars.push('<i class="icon icon-star-o"></i>');
				}
			}
		}
		
		return String.format('{1} <span class="avarage">({0})</span>', e.data.average, stars.join(' '));
    },
    renderStatus: function(d, c) {
    	c.css = 1 == parseInt(d) || d ? 'green' : 'red';
    	
    	return 1 == parseInt(d) || d ? _('kv.activate') : _('kv.deactivate');
    },
	renderDate: function(a) {
        if (Ext.isEmpty(a)) {
            return '—';
        }

        return a;
    }
});

Ext.reg('kv-grid-reviews', Kv.grid.Reviews);

Kv.combo.Status = function(config) {
    config = config || {};
    
    Ext.applyIf(config, {
        store: new Ext.data.ArrayStore({
            mode	: 'local',
            fields	: ['type', 'label'],
            data	: [
            	['0', _('kv.review_deactivate')],
            	['1', _('kv.review_activate')]
            ]
        }),
        remoteSort	: ['label', 'asc'],
        hiddenName	: 'active',
        valueField	: 'type',
        displayField: 'label',
        mode		: 'local'
    });
    
    Kv.combo.Status.superclass.constructor.call(this,config);
};

Ext.extend(Kv.combo.Status, MODx.combo.ComboBox);

Ext.reg('kv-combo-status', Kv.combo.Status);