<?php

namespace spec\SimpleKanban\Core\Kanban\UseCase\Board;

use SimpleKanban\Core\Kanban\UseCase\Board\OpenBoardUseCase;
use SimpleKanban\Core\Kanban\UseCase\Board\OpenBoardRequest;
use SimpleKanban\Core\Kanban\Model\Board\Board;
use SimpleKanban\Core\Kanban\Model\Board\BoardId;
use SimpleKanban\Core\Kanban\Model\Board\BoardGateway;
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
