<?php
return [
    'jhu' => [
        'zdt_logger' => [
            'logger' => 'Zend\Log\Logger'
        ],
    ],

    // zendframework/zend-developer-tools specific settings

    'view_manager' => [
        'template_map' => [
            'zend-developer-tools/toolbar/jhu-zdt-logger' => __DIR__ . '/../view/zend-developer-tools/toolbar/jhu-zdt-logger.phtml',
        ],
    ],

    'zenddevelopertools' => [
        'profiler' => [
            'collectors' => [
                'jhu_zdt_logger' => 'Jhu\ZdtLoggerModule\Collector',
            ],
        ],
        'toolbar' => [
            'entries' => [
                'jhu_zdt_logger' => 'zend-developer-tools/toolbar/jhu-zdt-logger',
            ],
        ],
    ],
];
