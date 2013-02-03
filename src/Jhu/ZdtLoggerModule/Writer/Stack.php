<?php

namespace Jhu\ZdtLoggerModule\Writer;

use Zend\Log\Writer\AbstractWriter;

/**
 * Log writer stacking up logs.
 *
 * @since   0.1
 * @author  Jérémy Huet <jeremy.huet@gmail.com>
 * @link    https://github.com/jhuet/JhuZdtLoggerModule
 * @package Jhu\ZdtLoggerModule
 * @license MIT
 */
class Stack extends AbstractWriter
{
    /**
     * Stacked logs
     *
     * @var array
     */
    protected $stack;

    /**
     * Constructor
     */
    public function __construct($options = null)
    {
        parent::__construct($options);

        $this->stack = array();
    }

    /**
     * @return array
     */
    public function getStack()
    {
        return $this->stack;
    }

    /**
     * @return void
     */
    public function shutdown()
    {
        $this->stack = null;
    }

    /**
     * Write a message to the logger.
     *
     * @param array $event event data
     * @return void
     */
    protected function doWrite(array $event)
    {
        $this->stack[] = $event;
    }
}
