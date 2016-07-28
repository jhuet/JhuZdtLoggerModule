<?php

namespace Jhu\ZdtLoggerModule\ServiceFactory;

use Interop\Container\ContainerInterface;
use Zend\Log\Logger;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Factory\FactoryInterface;
use Jhu\ZdtLoggerModule\Writer\Stack as StackWriter;

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
     * @return Logger
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $options = $container->get('Jhu\ZdtLoggerModule\Options');
        $logger  = $container->get($options->getLogger());
        if (! $logger instanceof Logger) {
            throw new ServiceNotCreatedException(
                '`logger` option of JhuZdtLoggerModule has to be an instance or extend Zend\Log\Logger class.'
            );
        }

        $writer = $container->get('Jhu\ZdtLoggerModule\Writer');
        /* @var $writer StackWriter */

        $logger->addWriter($writer);

        return $logger;
    }
}
