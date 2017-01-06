<?php

namespace Evaneos\Daemon;

/**
 * Interface DaemonMonitor
 *
 * @package Evaneos\Daemon
 */
interface DaemonMonitor
{
    /**
     * Monitor the daemon
     *
     * @param Daemon $daemon
     * @param mixed  $currentObject
     *
     * @return void
     */
    public function monitor(Daemon $daemon, $currentObject = null);
}
