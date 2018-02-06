<?php

namespace spec\SimpleKanban\Core\Kanban\Model\Board;

use SimpleKanban\Core\Kanban\Model\Board\Board;
use SimpleKanban\Core\Kanban\Model\Column\Column;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BoardSpec extends ObjectBehavior
{
    function it_has_no_columns_by_default()
    {
        $this->beConstructedOpen('anid','a title');
        $this->hasColumns()->shouldReturn(false);
    }

    function its_status_is_open_by_default()
    {
        $this->beConstructedOpen('anid','a title');
        $this->isOpen()->shouldReturn(true);
    }

    function it_adds_columns(Column $column)
    {
        $this->beConstructedOpen('anid','a title');
        $this->addColumn($column);
        $this->hasColumns()->shouldReturn(true);
    }

    function it_removes_columns(Column $column)
    {
        $this->beConstructedOpen('anid','a title');
        $this->addColumn($column);
        $this->removeColumn($column);
        $this->hasColumns()->shouldReturn(false);
    }

    function its_title_can_be_changed()
    {
        $this->beConstructedOpen('anid','a title');
        $this->changeTitle('another title');
        $this->getTitle()->shouldReturn('another title');
    }

    function it_can_be_closed()
    {
        $this->beConstructedOpen('anid','a title');
        $this->close();
        $this->isOpen()->shouldReturn(false);
    }
}
