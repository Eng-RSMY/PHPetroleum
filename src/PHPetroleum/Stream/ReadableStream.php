<?php

namespace PHPetroleum\Stream;

interface ReadableStream
{
    /**
     * Wait for content into the pipe
     *
     * @return string
     */
    public function read();
}
