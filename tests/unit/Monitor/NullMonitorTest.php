<?php

namespace Evaneos\Daemon\Monitor\Test;

use Evaneos\Daemon\Daemon;
use Evaneos\Daemon\Monitor\NullMonitor;
use Mockery\Mock;

class NullMonitorTest extends \PHPUnit_Framework_TestCase
{
    /** @var Daemon | Mock */
    private $daemon;

    /** @var NullMonitor */
    private $serviceUnderTest;

    protected function tearDown()
    {
        \Mockery::close();
    }

    protected function setUp()
    {
        $this->daemon = \Mockery::mock(Daemon::class);

        $this->serviceUnderTest = new NullMonitor();
    }

    /**
     * @test
     */
    public function itShouldDoNothing()
    {
        $this->serviceUnderTest->monitor($this->daemon);
    }
}
