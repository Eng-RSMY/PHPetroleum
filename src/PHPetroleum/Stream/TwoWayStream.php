<?php

namespace PHPetroleum\Stream;

use PHPetroleum\Pipe;
use PHPetroleum\Stream\ReadableStream;
use PHPetroleum\Stream\WritableStream;

class TwoWayStream implements ReadableStream, WritableStream
{
    /**
     * @param Pipe $reader The pipe which data is received
     * @param Pipe $writer The pipe which data is sent
     *
     * @return void
     */
    public function __construct(Pipe $reader, Pipe $writer)
    {
        $this->reader = $reader;
        $this->writer = $writer;
    }

    /**
     * {@inheritDoc}
     */
    public function read()
    {
        return $this->reader->read();
    }

    /**
     * {@inheritDoc}
     */
    public function write($content)
    {
        $this->writer->write($content);

        return $this;
    }
}
