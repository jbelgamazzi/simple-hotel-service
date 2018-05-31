<?php

namespace SimpleService\Output;

/**
 * @codeCoverageIgnore
 */
class FileStringOutput implements OutputInterface
{
    /**
     * @var string $filePath
     */
    private $filePath;

    /**
     * @param string $filePath
     */
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * @return string
     */
    public function load() : string
    {
        return file_get_contents($this->filePath);
    }
}
