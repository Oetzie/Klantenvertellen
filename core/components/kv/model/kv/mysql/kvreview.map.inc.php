<?php

    /**
     * Klantenvertellen
     *
     * Copyright 2018 by Oene Tjeerd de Bruin <modx@oetzie.nl>
     */
    
    $xpdo_meta_map['KvReview'] = [
        'package'       => 'kv',
        'version'       => '1.0',
        'table'         => 'kv_review',
        'extends'       => 'xPDOSimpleObject',
        'tableMeta'     => [
            'engine'        => 'InnoDB'
        ],
        'fields'        => [
            'id'            => null,
            'kv_id'         => null,
            'name'          => null,
            'city'          => null,
            'subject'       => null,
            'content'       => null,
            'recommendation' => null,
            'service'       => null,
            'expertise'     => null,
            'price'         => null,
            'active'        => null,
            'created'       => null
        ],
        'fieldMeta'     => [
            'id'            => [
                'dbtype'        => 'int',
                'precision'     => '11',
                'phptype'       => 'integer',
                'null'          => false,
                'index'         => 'pk',
                'generated'     => 'native'
            ],
            'kv_id'         => [
                'dbtype'        => 'int',
                'precision'     => '11',
                'phptype'       => 'integer',
                'null'          => false,
                'default'       => 0
            ],
            'name'          => [
                'dbtype'        => 'varchar',
                'precision'     => '75',
                'phptype'       => 'string',
                'null'          => false,
                'default'       => ''
            ],
            'city'          => [
                'dbtype'        => 'varchar',
                'precision'     => '75',
                'phptype'       => 'string',
                'null'          => false,
                'default'       => ''
            ],
            'subject'       => [
                'dbtype'        => 'varchar',
                'precision'     => '255',
                'phptype'       => 'string',
                'null'          => false,
                'default'       => ''
            ],
            'content'       => [
                'dbtype'        => 'text',
                'phptype'       => 'string',
                'null'          => false,
                'default'       => ''
            ],
            'recommendation' => [
                'dbtype'        => 'int',
                'precision'     => '1',
                'phptype'       => 'integer',
                'null'          => false,
                'default'       => 1
            ],
            'service'       => [
                'dbtype'        => 'int',
                'precision'     => '2',
                'phptype'       => 'integer',
                'null'          => false,
                'default'       => 0
            ],
            'expertise'     => [
                'dbtype'        => 'int',
                'precision'     => '2',
                'phptype'       => 'integer',
                'null'          => false,
                'default'       => 0
            ],
            'price'         => [
                'dbtype'        => 'int',
                'precision'     => '2',
                'phptype'       => 'integer',
                'null'          => false,
                'default'       => 0
            ],
            'active'        => [
                'dbtype'        => 'int',
                'precision'     => '1',
                'phptype'       => 'integer',
                'null'          => false,
                'default'       => 1
            ],
            'created'       => [
                'dbtype'        => 'timestamp',
                'phptype'       => 'timestamp',
                'null'          => false,
                'default'       => '0000-00-00 00:00:00'
            ]
        ],
        'indexes'       => [
            'PRIMARY'       => [
                'alias'         => 'PRIMARY',
                'primary'       => true,
                'unique'        => true,
                'columns'       => [
                    'id'            => [
                        'collation'     => 'A',
                        'null'          => false
                    ]
                ]
            ]
        ]
    ];

?>