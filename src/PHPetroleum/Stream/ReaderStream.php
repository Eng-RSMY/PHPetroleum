<?php

namespace PHPetroleum\Stream;

use PHPetroleum\Pipe;
use PHPetroleum\Stream\ReadableStream;

class ReaderStream implements ReadableStream
{
    /**
     * @param Pipe $reader The pipe which data is received
     *
     * @return void
     */
    public function __construct(Pipe $reader)
    {
        $this->reader = $reader;
    }

    /**
     * {@inheritDoc}
     */
    public function read()
    {
        return $this->reader->read();
    }
}
