<?php
return array(
    'jhu' => array(
        'zdt_logger' => array(
            'logger' => 'Zend\Log\Logger'
        ),
    ),

    // zendframework/zend-developer-tools specific settings

    'view_manager' => array(
        'template_map' => array(
            'zend-developer-tools/toolbar/jhu-zdt-logger' => __DIR__ . '/../view/zend-developer-tools/toolbar/jhu-zdt-logger.phtml',
        ),
    ),

    'zenddevelopertools' => array(
        'profiler' => array(
            'collectors' => array(
                'jhu_zdt_logger' => 'Jhu\ZdtLoggerModule\Collector',
            ),
        ),
        'toolbar' => array(
            'entries' => array(
                'jhu_zdt_logger' => 'zend-developer-tools/toolbar/jhu-zdt-logger',
            ),
        ),
    ),
);
