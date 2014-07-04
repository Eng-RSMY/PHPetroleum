<?PHP

namespace spec\PHPetroleum\Stream;

use PHPetroleum\Pipe;
use PhpSpec\ObjectBehavior;

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

    function it_read_the_pipe(Pipe $pipe)
    {
        $pipe->read()->shouldBeCalled(1);
        $pipe->read()->willReturn('the content');

        $this->read()->shouldReturn('the content');
    }
}
