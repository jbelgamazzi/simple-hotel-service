<?php

namespace SimpleService\Output;

/**
 * @codeCoverageIgnore
 */
class Output implements OutputInterface
{
    /**
     * @var OutputInterface $output
     */
    private $output;

    /**
     * @param \SimpleService\Output\OutputInterface $output
     */
    public function set(OutputInterface $output)
    {
        $this->output = $output;
    }

    /**
     * @return \SimpleService\Output\OutputInterface
     */
    public function load()
    {
        return $this->output->load();
    }
}
