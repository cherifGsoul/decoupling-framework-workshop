<?php

namespace spec\SimpleKanban\Core\Kanban\Model\Board;

use SimpleKanban\Core\Kanban\Model\Board\Board;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BoardSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Board::class);
    }
}
