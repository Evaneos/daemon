<?php

namespace Evaneos\Daemon\Test\Mock;

use Evaneos\Daemon\Worker;

class TestWorker extends Worker
{
    /** @var bool */
    public $exited = false;

    protected function exitWorker($returnValue)
    {
        $this->exited = true;
    }
}
