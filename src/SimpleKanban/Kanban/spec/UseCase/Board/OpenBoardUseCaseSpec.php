<?php

namespace  spec\SimpleKanban\Kanban\UseCase\Board;

use SimpleKanban\Kanban\UseCase\Board\OpenBoardUseCase;
use SimpleKanban\Kanban\UseCase\Board\OpenBoardRequest;
use SimpleKanban\Kanban\Model\Board\Board;
use SimpleKanban\Kanban\Model\Board\BoardId;
use SimpleKanban\Kanban\Model\Board\BoardGateway;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OpenBoardUseCaseSpec extends ObjectBehavior
{
    function it_handles_open_board_use_case(OpenBoardRequest $request, BoardGateway $boardGateway)
    {
    	$this->beConstructedWith($boardGateway);
    	$board = new Board(BoardId::generate(), 'a title');
    	$boardGateway->nextIdentity()->willReturn($board->getId())->shouldBeCalled();
    	$boardGateway->forTitle(Argument::type('string'))->willReturn(false)->shouldBeCalled();
    	$request->getTitle()->willReturn($board->getTitle())->shouldBeCalled();
    	$boardGateway->add($board)->shouldBeCalled();
    	$this->handle($request);
    }
}
