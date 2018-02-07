<?php

namespace  spec\SimpleKanban\Kanban\Model\Column;

use SimpleKanban\Kanban\Model\Column\Column;
use SimpleKanban\Kanban\Model\Column\ColumnId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ColumnSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(ColumnId::generate(), 'a column');
    }
    function it_has_a_title()
    {
        $this->beConstructedWith(ColumnId::generate(),'a title');
        $this->getTitle()->shouldReturn('a title');
    }

    function it_has_no_cards_by_default()
    {
        $this->hasCards()->shouldReturn(false);
    }
}
