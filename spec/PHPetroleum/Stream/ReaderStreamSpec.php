<?php

namespace spec\PHPetroleum\Stream;

use PHPetroleum\Pipe;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReaderStreamSpec extends ObjectBehavior
{
    function let(Pipe $pipe)
    {
        $this->beConstructedWith($pipe);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('PHPetroleum\Stream\ReaderStream');
    }
}
