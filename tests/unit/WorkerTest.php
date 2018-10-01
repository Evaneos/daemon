<?php

namespace Evaneos\Daemon\Test;

use Evaneos\Daemon\Daemon;
use Evaneos\Daemon\Worker;
use Mockery\Mock;

class WorkerTest extends \PHPUnit_Framework_TestCase
{
    /** @var Daemon | Mock */
    private $daemon;

    /** @var Worker */
    private $serviceUnderTest;

    protected function tearDown()
    {
        \Mockery::close();
    }

    protected function setUp()
    {
        $this->daemon = \Mockery::spy(Daemon::class);

        $this->serviceUnderTest = new Worker($this->daemon);
    }

    /**
     * @test
     */
    public function it_starts_daemon_when_it_runs()
    {
        $this->serviceUnderTest->run();

        $this->daemon->shouldHaveReceived('start')->once();
    }

    /**
     * @test
     */
    public function it_tells_to_daemon_to_stop_when_it_is_receiving_SIGINT()
    {
        $this->serviceUnderTest->signalHandler(SIGINT);

        $this->daemon->shouldHaveReceived('stop')->once();
    }

    /**
     * @test
     */
    public function it_tells_to_daemon_to_stop_when_it_is_receiving_SIGTERM()
    {
        $this->serviceUnderTest->signalHandler(SIGTERM);

        $this->daemon->shouldHaveReceived('stop')->once();
    }
}
