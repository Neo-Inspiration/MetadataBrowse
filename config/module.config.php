<?php
return [
    'view_manager' => [
        'template_path_stack'      => [
            OMEKA_PATH . '/modules/MetadataBrowse/view',
        ],
    ],
    'navigation' => [
        'site' => [
            [
                'label' => 'Metadata Browse', // @translate
                'route' => 'admin/site/slug/metadata-browse/default',
                'action' => 'index',
                'useRouteMatch' => true,
                'pages' => [
                    [
                        'route' => 'admin/site/slug/metadata-browse/default',
                        'visible' => false,
                    ],
                ],
            ],
        ],
    ],
    'router' => [
        'routes' => [
            'admin' => [
                'child_routes' => [
                    'site' => [
                        'child_routes' => [
                            'slug' => [
                                'child_routes' => [
                                    'metadata-browse' => [
                                        'type' => 'Literal',
                                        'options' => [
                                            'route' => '/metadata- browse',
                                            'defaults' => [
                                                '__NAMESPACE__' => 'MetadataBrowse\Controller',
                                                'controller' => 'index',
                                                'action' => 'index',
                                            ],
                                        ],
                                        'may_terminate' => true,
                                        'child_routes' => [
                                            'default' => [
                                                'type' => 'Segment',
                                                'options' => [
                                                    'route' => '/:action',
                                                    'constraints' => [
                                                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                ]
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
