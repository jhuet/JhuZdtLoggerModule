<?php

namespace Jhu\ZdtLoggerModule;

use Jhu\ZdtLoggerModule\ServiceFactory;
use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Feature\InitProviderInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\ModuleManagerInterface;

/**
 * @since   0.1
 * @author  Jérémy Huet <jeremy.huet@gmail.com>
 * @link    https://github.com/jhuet/JhuZdtLoggerModule
 * @package Jhu\ZdtLoggerModule
 * @license MIT
 */
class Module implements
    AutoloaderProviderInterface,
    BootstrapListenerInterface,
    ConfigProviderInterface,
    ServiceProviderInterface,
    InitProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function init(ModuleManagerInterface $manager)
    {
        $events = $manager->getEventManager();
        // Initialize logger collector once the profiler is initialized itself
        $events->attach('profiler_init', function(EventInterface $e) use ($manager) {
            $manager->getEvent()->getParam('ServiceManager')->get('Jhu\ZdtLoggerModule\Collector');
        } );
    }

    /**
     * {@inheritDoc}
     */
    public function onBootstrap(EventInterface $e)
    {
        $application = $e->getParam('application');
        $config = $application->getServiceManager()->get('Config');

        // If the default logger is different and ZDT's toolbar is activated,
        // we initialize ours to add our functionalities
        if (
            $config['jhu']['zdt_logger']['logger'] != 'Zend\Log\Logger' &&
            $config['zenddevelopertools']['toolbar']['enabled'] == true
        ) {
            $application->getServiceManager()->get('jhu.zdt_logger');
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/../../../autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/../../../src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getConfig()
    {
        return include __DIR__ . '/../../../config/module.config.php';
    }

    /**
     * {@inheritDoc}
     */
    public function getServiceConfig()
    {
        return array(
            'invokables' => array(
                'Jhu\ZdtLoggerModule\Writer'    => 'Jhu\ZdtLoggerModule\Writer\Stack',
                'Zend\Log\Logger'               => 'Zend\Log\Logger'
            ),

            'factories' => array(
                'Jhu\ZdtLoggerModule\Logger'    => new ServiceFactory\LoggerFactory(),
                'Jhu\ZdtLoggerModule\Collector' => new ServiceFactory\CollectorFactory(),
                'Jhu\ZdtLoggerModule\Options'   => new ServiceFactory\ModuleOptionsFactory(),
            ),

            'aliases' => array(
                'jhu.zdt_logger' => 'Jhu\ZdtLoggerModule\Logger',
            ),
        );
    }
}
