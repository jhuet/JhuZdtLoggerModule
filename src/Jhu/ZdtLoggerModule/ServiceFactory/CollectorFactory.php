<?php

namespace Jhu\ZdtLoggerModule\ServiceFactory;

use Jhu\ZdtLoggerModule\Collector\ZendWriterCollector;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

/**
 * Zdt Collector factory
 *
 * @since   0.1
 * @author  Jérémy Huet <jeremy.huet@gmail.com>
 * @link    https://github.com/jhuet/JhuZdtLoggerModule
 * @package Jhu\ZdtLoggerModule
 * @license MIT
 */
class CollectorFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @return \Jhu\ZdtLoggerModule\Collector\ZendWriterCollector
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /* @var $writer \Jhu\ZdtLogger\Writer\Zdt */
        $writer = $serviceLocator->get('Jhu\ZdtLoggerModule\Writer');

        return new ZendWriterCollector($writer, 'jhu_zdt_logger');
    }
}
