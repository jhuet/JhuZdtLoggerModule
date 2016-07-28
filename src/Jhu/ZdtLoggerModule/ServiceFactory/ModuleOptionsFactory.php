<?php

namespace Jhu\ZdtLoggerModule\ServiceFactory;

use Interop\Container\ContainerInterface;
use Jhu\ZdtLoggerModule\Options;
use Zend\ServiceManager\Factory\FactoryInterface;

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
     * @return Options\ModuleOptions
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('Configuration');

        return new Options\ModuleOptions(isset($config['jhu']['zdt_logger']) ? $config['jhu']['zdt_logger'] : []);
    }
}
