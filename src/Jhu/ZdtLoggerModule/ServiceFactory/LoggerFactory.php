<?php

namespace Jhu\ZdtLoggerModule\ServiceFactory;

use Zend\Log\Logger;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Zdt Logger factory
 *
 * @since   0.1
 * @author  Jérémy Huet <jeremy.huet@gmail.com>
 * @link    https://github.com/jhuet/JhuZdtLoggerModule
 * @package Jhu\ZdtLoggerModule
 * @license MIT
 */
class LoggerFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @return Zend\Log\Logger
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $options = $serviceLocator->get('Jhu\ZdtLoggerModule\Options');
        $logger = $serviceLocator->get($options->getLogger());

        /* @var $writer \Jhu\ZdtLogger\Writer\Zdt */
        $writer = $serviceLocator->get('Jhu\ZdtLoggerModule\Writer');

        $logger->addWriter($writer);

        return $logger;
    }
}
