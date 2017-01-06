<?php
namespace Evaneos\Daemon\CLI;

use Evaneos\Daemon\Worker;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class DaemonWorkerCommand
 *
 * @package Evaneos\Daemon\CLI
 *
 * @codeCoverageIgnore
 */
class DaemonWorkerCommand extends Command
{
    /**
     * @var Worker
     */
    private $worker;

    /**
     * Constructor
     *
     * @param Worker $worker
     * @param string $name
     */
    public function __construct(Worker $worker, $name = null)
    {
        $this->worker = $worker;
        parent::__construct($name);
    }

    /**
     * Code executed when command invoked
     *
     * @param  InputInterface  $input
     * @param  OutputInterface $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->worker->run();
    }
}
