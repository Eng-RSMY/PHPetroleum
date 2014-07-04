<?php

namespace spec\PHPetroleum;

use PHPetroleum\Pipe;
use PhpSpec\ObjectBehavior;

class PipeSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('/tmp/spec_file');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('PHPetroleum\Pipe');
    }

    function it_create_the_pipe_file()
    {
        $this->write('content');

        if (!is_file('/tmp/spec_file')) {

            throw new \Exception("Can't find file \"/tmp/spec_file\"");
        }
    }

    function it_write_into_the_pipe_file()
    {
        $this->write('content');

        if ('00000007content' !== file_get_contents('/tmp/spec_file')) {

            throw new \Exception('Expect to find "00000007content" into the pipe, "'. file_get_contents('/tmp/spec_file') .'" found');
        }
    }

    function it_read_the_content_of_the_pipe()
    {
        $pipe = new Pipe('/tmp/spec_file');
        $pipe->write('the content');

        $this->read()->shouldReturn('the content');
    }

    function it_can_write_bigger_text()
    {
        $array = array();
        for ($i = 1; $i < 100000; $i++) {
            $array[] = md5($i) . md5($i) . md5($i);
        }

        $text = serialize($array);

        $this->write($text);

        $this->read()->shouldReturn($text);
    }

    function letGo()
    {
        if (is_file('/tmp/spec_file')) {
            unlink('/tmp/spec_file');
        }
    }
}
