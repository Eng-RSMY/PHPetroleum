<?php

namespace spec\PHPetroleum\Stream;

use PHPetroleum\Pipe;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TwoWayStreamSpec extends ObjectBehavior
{
    function let(Pipe $input, Pipe $output)
    {
        $this->beConstructedWith($input, $output);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('PHPetroleum\Stream\TwoWayStream');
    }

    function it_write_into_the_pipe(Pipe $output)
    {
        $output->write('test')->shouldBeCalled(1);

        $this->write('test')->shouldReturn($this);
    }

    function it_read_the_pipe(Pipe $input)
    {
        $input->read()->shouldBeCalled(1);
        $input->read()->willReturn('the content');

        $this->read()->shouldReturn('the content');
    }
}
