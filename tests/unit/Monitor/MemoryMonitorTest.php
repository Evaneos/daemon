<?php

namespace Evaneos\Daemon\Monitor\Test;

use Evaneos\Daemon\Daemon;
use Evaneos\Daemon\Test\Mock\TestMemoryMonitor;
use Mockery\Mock;
use Psr\Log\LoggerInterface;

class MemoryMonitorTest extends \PHPUnit_Framework_TestCase
{
    /** @var Daemon | Mock */
    private $daemon;

    /** @var LoggerInterface | Mock */
    private $logger;

    /** @var TestMemoryMonitor */
    private $serviceUnderTest;

    protected function tearDown()
    {
        \Mockery::close();
    }

    protected function setUp()
    {
        $this->daemon = \Mockery::mock(Daemon::class);
        $this->logger = \Mockery::mock(LoggerInterface::class);

        $this->serviceUnderTest = new TestMemoryMonitor($this->logger);
    }

    /**
     * @test
     */
    public function itShouldDoNothingIfMemoryStayTheSame()
    {
        $this->logger->shouldNotReceive('warning');

        $this->serviceUnderTest->monitor($this->daemon);
    }

    /**
     * @test
     */
    public function itShouldWarnIfMemoryGoesUp()
    {
        $this->logger->shouldReceive('warning')->times(9);

        for ($i = 0; $i < 10; $i++) {
            $this->serviceUnderTest->monitor($this->daemon);
        }
    }
}
