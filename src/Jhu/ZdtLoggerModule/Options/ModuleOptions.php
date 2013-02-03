<?php

namespace Jhu\ZdtLoggerModule\Options;

use Zend\Stdlib\AbstractOptions;

/**
 * @since   0.1
 * @author  Jérémy Huet <jeremy.huet@gmail.com>
 * @link    https://github.com/jhuet
 * @package Jhu\ZdtLoggerModule
 * @license MIT
 */
class ModuleOptions extends AbstractOptions
{
    /**
     * Turn off strict options mode
     */
    protected $__strictMode__ = false;

    /**
     * The logger used for the application
     *
     * @var string|\Zend\Log\Logger
     */
    protected $logger = 'Zend\Log\Logger';

    /**
     * Set logger
     *
     * @param  string|\Zend\Log\Logger $logger
     * @return ModuleOptions
     */
    public function setLogger($logger)
    {
        $this->logger =  $logger;

        return $this;
    }

    /**
     * Get logger
     *
     * @return string
     */
    public function getLogger()
    {
        return $this->logger;
    }
}
