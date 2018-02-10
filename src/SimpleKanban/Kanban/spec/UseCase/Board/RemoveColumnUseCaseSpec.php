<?php

namespace spec\SimpleKanban\Kanban\UseCase\Board;

use SimpleKanban\Kanban\UseCase\Board\RemoveColumnUseCase;
use SimpleKanban\Kanban\UseCase\Board\RemoveColumnRequest;
use SimpleKanban\Kanban\Model\Board\Board;
use SimpleKanban\Kanban\Model\Board\BoardId;
use SimpleKanban\Kanban\Model\Column\Column;
use SimpleKanban\Kanban\Model\Column\ColumnId;
use SimpleKanban\Kanban\Model\Board\BoardGateway;
use SimpleKanban\Kanban\Model\Column\ColumnGateway;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RemoveColumnUseCaseSpec extends ObjectBehavior
{
    function it_handles_remove_column_use_case(BoardGateway $boardGateway, ColumnGateway $columnGateway, RemoveColumnRequest $request)
    {
        $this->beConstructedWith($boardGateway, $columnGateway);
        
        $board = new Board(BoardId::generate(), 'a title', 'a-title');
        $column = new Column(ColumnId::generate(), 'a title', $board->getId());

        $request->getColumnId()->willReturn($column->getId())->shouldBeCalled();
        $request->getBoardId()->willReturn($board->getId())->shouldBeCalled();
        $columnGateway->forId($column->getId())->willReturn($column)->shouldBeCalled();
        $boardGateway->forId($board->getId())->willReturn($board)->shouldBeCalled();
        $boardGateway->persist($board)->shouldBeCalled();
        
        $this->handle($request);
        
    }
}
