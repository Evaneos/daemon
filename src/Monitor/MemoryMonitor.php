<?php

namespace Evaneos\Daemon\Monitor;

use Evaneos\Daemon\Daemon;
use Evaneos\Daemon\DaemonMonitor;
use Psr\Log\LoggerInterface;

/**
 * Class MemoryMonitor
 *
 * @package Evaneos\Daemon\Monitor
 */
class MemoryMonitor implements DaemonMonitor
{
    /** @var LoggerInterface */
    private $logger;

    /** @var int */
    private $memory;

    /**
     * MemoryMonitor constructor.
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->memory = 0;
    }

    /**
     * Monitor the daemon
     *
     * @param Daemon $daemon
     * @param mixed  $currentObject
     *
     * @return void
     */
    public function monitor(Daemon $daemon, $currentObject = null)
    {
        $currentMemory = $this->getMemoryUsage();
        if ($this->memory > 0 && $currentMemory > $this->memory) {
            $this->logger
                ->warning(
                    'Memory usage increased',
                    [
                        'bytes_increased_by'   => $currentMemory - $this->memory,
                        'bytes_current_memory' => $currentMemory
                    ]
                );
        }
        $this->memory = $currentMemory;
    }

    /**
     * @return int
     *
     * @codeCoverageIgnore
     */
    protected function getMemoryUsage()
    {
        return memory_get_usage(true);
    }
}
