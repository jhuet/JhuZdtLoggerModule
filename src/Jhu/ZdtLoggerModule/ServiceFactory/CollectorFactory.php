<?php

namespace Jhu\ZdtLoggerModule\ServiceFactory;

use Interop\Container\ContainerInterface;
use Jhu\ZdtLoggerModule\Collector\ZendWriterCollector;
use Jhu\ZdtLoggerModule\Writer\Stack as StackWriter;
use Zend\ServiceManager\Factory\FactoryInterface;

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
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $writer = $container->get('Jhu\ZdtLoggerModule\Writer');
        /* @var $writer StackWriter */

        return new ZendWriterCollector($writer, 'jhu_zdt_logger');
    }
}
