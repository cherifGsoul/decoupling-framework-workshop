<?php

namespace  spec\SimpleKanban\Kanban\Model\Board;

use SimpleKanban\Kanban\Model\Board\Board;
use SimpleKanban\Kanban\Model\Board\BoardId;
use SimpleKanban\Kanban\Model\Column\Column;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BoardSpec extends ObjectBehavior
{
    function it_has_no_columns_by_default()
    {
        $this->beConstructedOpen(BoardId::generate(),'a title');
        $this->hasColumns()->shouldReturn(false);
    }

    function its_status_is_open_by_default()
    {
        $this->beConstructedOpen(BoardId::generate(),'a title');
        $this->isOpen()->shouldReturn(true);
    }

    function it_adds_columns(Column $column)
    {
        $this->beConstructedOpen(BoardId::generate(),'a title');
        $this->addColumn($column);
        $this->hasColumns()->shouldReturn(true);
    }

    function it_removes_columns(Column $column)
    {
        $this->beConstructedOpen(BoardId::generate(),'a title');
        $this->addColumn($column);
        $this->removeColumn($column);
        $this->hasColumns()->shouldReturn(false);
    }

    function its_title_can_be_changed()
    {
        $this->beConstructedOpen(BoardId::generate(),'a title');
        $this->changeTitle('another title');
        $this->getTitle()->shouldReturn('another title');
    }

    function it_can_be_closed()
    {
        $this->beConstructedOpen(BoardId::generate(),'a title');
        $this->close();
        $this->isOpen()->shouldReturn(false);
    }
}
