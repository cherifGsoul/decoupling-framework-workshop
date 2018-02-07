<?php

namespace spec\SimpleKanban\Kanban\UseCase\Board;

use SimpleKanban\Kanban\UseCase\Board\CloseBoardUseCase;
use SimpleKanban\Kanban\UseCase\Board\CloseBoardRequest;
use SimpleKanban\Kanban\Model\Board\BoardGateway;
use SimpleKanban\Kanban\Model\Board\Board;
use SimpleKanban\Kanban\Model\Board\BoardId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CloseBoardUseCaseSpec extends ObjectBehavior
{
    function it_handles_clase_board_use_case(BoardGateway $boardGateway, CloseBoardRequest $request)
    {
    	$this->beConstructedWith($boardGateway);
        $board = Board::open(BoardId::generate(), 'a board');
        $request->getBoardId()->willReturn($board->getId())->shouldBeCalled();
        $boardGateway->forId($board->getId())->willReturn($board)->shouldBeCalled();
        $boardGateway->add($board)->shouldBeCalled();
        $this->handle($request);
    }
}
