<?php

namespace spec\PHPetroleum\Stream;

use PHPetroleum\Pipe;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WriterStreamSpec extends ObjectBehavior
{
    function let(Pipe $pipe)
    {
        $this->beConstructedWith($pipe);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('PHPetroleum\Stream\WriterStream');
    }

    function it_write_into_the_pipe(Pipe $pipe)
    {
        $pipe->write('test')->shouldBeCalled(1);

        $this->write('test')->shouldReturn($this);
    }
}
