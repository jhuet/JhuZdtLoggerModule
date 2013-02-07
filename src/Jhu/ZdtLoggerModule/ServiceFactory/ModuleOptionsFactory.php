<?php

namespace Jhu\ZdtLoggerModule\ServiceFactory;

use Jhu\ZdtLoggerModule\Options;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * @since   0.1
 * @author  Jérémy Huet <jeremy.huet@gmail.com>
 * @link    https://github.com/jhuet
 * @package Jhu\ZdtLoggerModule
 * @license MIT
 */
class ModuleOptionsFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @return \Jhu\ZdtLoggerModule\Options\ModuleOptions
     */
    public function createService(ServiceLocatorInterface $services)
    {
        $config = $services->get('Configuration');

        return new Options\ModuleOptions(isset($config['jhu']['zdt_logger']) ? $config['jhu']['zdt_logger'] : array());
    }
}
