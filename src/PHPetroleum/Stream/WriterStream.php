<?php

namespace PHPetroleum\Stream;

use PHPetroleum\Pipe;
use PHPetroleum\Stream\WritableStream;

class WriterStream implements WritableStream
{
    /**
     * @param Pipe $writer The pipe which data is sent
     *
     * @return void
     */
    public function __construct(Pipe $writer)
    {
        $this->writer = $writer;
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
