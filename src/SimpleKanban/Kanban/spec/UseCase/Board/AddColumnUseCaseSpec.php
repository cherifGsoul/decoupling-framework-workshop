<?php

namespace spec\SimpleKanban\Kanban\UseCase\Board;

use SimpleKanban\Kanban\UseCase\Board\AddColumnUseCase;
use SimpleKanban\Kanban\UseCase\Board\AddColumnRequest;
use SimpleKanban\Kanban\Model\Board\Board;
use SimpleKanban\Kanban\Model\Board\BoardId;
use SimpleKanban\Kanban\Model\Board\BoardGateway;
use SimpleKanban\Kanban\Model\Column\ColumnGateway;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AddColumnUseCaseSpec extends ObjectBehavior
{
    function it_handles_add_column_use_case(AddColumnRequest $request, BoardGateway $boardGateway, ColumnGateway $columnGateway)
    {
        $this->beConstructedWith($boardGateway, $columnGateway);
        $board = new Board(BoardId::generate(), 'a board');
        $request->getBoardId()->willReturn($board->getId())->shouldBeCalled();
        $request->getColumnTitle()->willReturn('a column')->shouldBeCalled();
        $boardGateway->forId($board->getId())->willReturn($board)->shouldBeCalled();
        $boardGateway->add($board)->shouldBeCalled();
        $this->handle($request);
    }
}
