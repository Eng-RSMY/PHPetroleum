<?php

namespace spec\PHPetroleum\Stream;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TwoWayStreamSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('PHPetroleum\Stream\TwoWayStream');
    }
}
