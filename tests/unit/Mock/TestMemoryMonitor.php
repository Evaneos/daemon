<?php

namespace Evaneos\Daemon\Test\Mock;

use Evaneos\Daemon\Monitor\MemoryMonitor;

class TestMemoryMonitor extends MemoryMonitor
{
    /** @var int */
    private $memoryUsage = 1;

    protected function getMemoryUsage()
    {
        return $this->memoryUsage++;
    }
}
