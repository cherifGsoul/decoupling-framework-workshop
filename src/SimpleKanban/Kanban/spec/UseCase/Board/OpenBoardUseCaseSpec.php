<?php

namespace  spec\SimpleKanban\Kanban\UseCase\Board;

use SimpleKanban\Kanban\UseCase\Board\OpenBoardUseCase;
use SimpleKanban\Kanban\UseCase\Board\OpenBoardRequest;
use SimpleKanban\Kanban\Model\Board\Board;
use SimpleKanban\Kanban\Model\Board\BoardId;
use SimpleKanban\Kanban\Model\Board\BoardGateway;
use SimpleKanban\Kanban\Model\Board\BoardTitleSluggifier;
use SimpleKanban\Kanban\UseCase\DataTransformer\Board\BoardDataTransformer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OpenBoardUseCaseSpec extends ObjectBehavior
{
    function it_handles_open_board_use_case(OpenBoardRequest $request, BoardDataTransformer $dataTransformer, BoardGateway $boardGateway, BoardTitleSluggifier $boardTitleSluggifier)
    {
    	$this->beConstructedWith($boardGateway, $dataTransformer, $boardTitleSluggifier);
    	$board = new Board(BoardId::generate(), 'a title', 'a-title');
    	$boardGateway->nextIdentity()->willReturn($board->getId())->shouldBeCalled();
    	$boardGateway->forTitle(Argument::type('string'))->willReturn(false)->shouldBeCalled();
    	$request->getTitle()->willReturn($board->getTitle())->shouldBeCalled();
        $boardTitleSluggifier->sluggify($board->getTitle())->willReturn($board->getSlug())->shouldBeCalled();
    	$boardGateway->persist($board)->shouldBeCalled();
    	$this->handle($request);
    }
}
