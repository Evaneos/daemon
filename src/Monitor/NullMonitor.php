<?php

namespace Evaneos\Daemon\Monitor;

use Evaneos\Daemon\Daemon;
use Evaneos\Daemon\DaemonMonitor;

/**
 * Class NullMonitor
 *
 * @package Evaneos\Daemon\Monitor
 */
class NullMonitor implements DaemonMonitor
{
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
    }
}
