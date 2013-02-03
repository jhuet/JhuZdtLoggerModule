<?php

namespace Jhu\ZdtLoggerModule\Collector;

use ZendDeveloperTools\Collector\CollectorInterface;
use ZendDeveloperTools\Collector\AutoHideInterface;

use Zend\Mvc\MvcEvent;

use Jhu\ZdtLoggerModule\Writer\Stack as StackWriter;

/**
 * @since   0.1
 * @author  Jérémy Huet <jeremy.huet@gmail.com>
 * @link    https://github.com/jhuet
 * @package Jhu\ZdtLoggerModule
 * @license MIT
 */
class ZendWriterCollector implements CollectorInterface, AutoHideInterface
{
    /**
     * Collector priority
     */
    const PRIORITY = 10;

    /**
     * @var \Jhu\ZdtLoggerModule\Writer\Stack
     */
    protected $zendWriter;

    /**
     * @var string
     */
    protected $name;

    /**
     * @param Jhu\ZdtLoggerModule\Writer\Stack  $zendWriter
     * @param string                            $name
     */
    public function __construct(StackWriter $zendWriter, $name)
    {
        $this->zendWriter = $zendWriter;
        $this->name = (string) $name;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function getPriority()
    {
        return static::PRIORITY;
    }

    /**
     * {@inheritDoc}
     */
    public function collect(MvcEvent $mvcEvent)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function canHide()
    {
        return ! count($this->zendWriter->getStack());
    }

    /**
     * @return int
     */
    public function getLogsCount()
    {
        return count($this->zendWriter->getStack());
    }

    /**
     * @return array
     */
    public function getLogs()
    {
        return $this->zendWriter->getStack();
    }
}
