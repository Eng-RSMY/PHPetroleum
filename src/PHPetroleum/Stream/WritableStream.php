<?php

namespace PHPetroleum\Stream;

interface WritableStream
{
    /**
     * Write content into the stream
     *
     * @param string $content
     *
     * @return WritableStream
     */
    public function write($content);
}
