<?php

namespace Evaneos\Daemon\Test;

use Evaneos\Daemon\Daemon;
use Evaneos\Daemon\Test\Mock\TestWorker;
use Mockery\Mock;

class WorkerTest extends \PHPUnit_Framework_TestCase
{
    /** @var Daemon | Mock */
    private $daemon;

    /** @var TestWorker */
    private $serviceUnderTest;

    protected function tearDown()
    {
        \Mockery::close();
    }

    protected function setUp()
    {
        $this->daemon = \Mockery::mock(Daemon::class);

        $this->serviceUnderTest = new TestWorker($this->daemon);
    }

    /**
     * @test
     */
    public function itShouldStartTheDemon()
    {
        $this->daemon->shouldReceive('start')->once();

        $this->serviceUnderTest->run();
    }

    /**
     * @test
     */
    public function itShouldStopTheWorkerWhenReceivingSIGINT()
    {
        $this->daemon->shouldReceive('stop')->once();

        $this->serviceUnderTest->signalHandler(SIGINT);
        $this->assertTrue($this->serviceUnderTest->exited);
    }

    /**
     * @test
     */
    public function itShouldStopTheWorkerWhenReceivingSIGTERM()
    {
        $this->daemon->shouldReceive('stop')->once();

        $this->serviceUnderTest->signalHandler(SIGTERM);
        $this->assertTrue($this->serviceUnderTest->exited);
    }

    /**
     * @test
     */
    public function itShouldDoNothingToTheWorkerWhenReceivingSIGHUP()
    {
        $this->daemon->shouldNotReceive('start');
        $this->daemon->shouldNotReceive('stop');

        $this->serviceUnderTest->signalHandler(SIGHUP);
    }
}
