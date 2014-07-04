<?php

namespace PHPetroleum;

class Pipe
{
    private $name;
    private $pipe;
    private $size;

    /**
     * @param string $name
     * @param int $size
     *
     * @return void
     */
    public function __construct($name, $size = 8)
    {
        $this->name = $name;
        $this->size = $size;
    }

    /**
     * Create the file if needed
     *
     * @return Pipe
     */
    public function create(){
        if (!is_file($this->name)) {

            return;
        }

        posix_mkfifo(
            $this->name,
            0777
        );

        return $this;
    }

    /**
     * Open the file with the given mode
     *
     * @param string $mode
     *
     * @return mixed
     */
    public function open($mode)
    {
        $this->create();

        return $this->pipe = fopen(
            $this->name,
            $mode
        );
    }

    /**
     * Write the content into the file
     *
     * @param string $name
     *
     * @return Pipe
     */
    public function write($string){
        $string = (string)$string;
        $length = strlen($string);

        $this->open('w');
        fwrite($this->pipe, str_pad($length, $this->size, "0", STR_PAD_LEFT));
        fwrite($this->pipe, $string);

        return $this;
    }

    /**
     * Wait for file content. Return the content
     *
     * @return string
     */
    public function read(){
        $this->open('r');
        $length = fread($this->pipe, $this->size);

        return fread($this->pipe, intval($length));
    }
}
