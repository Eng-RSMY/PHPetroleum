<?php

namespace spec\PHPetroleum\Stream;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WriterStreamSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('PHPetroleum\Stream\WriterStream');
    }
}
