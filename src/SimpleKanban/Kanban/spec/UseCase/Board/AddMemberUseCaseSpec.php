<?php

namespace spec\SimpleKanban\Kanban\UseCase\Board;

use SimpleKanban\Kanban\UseCase\Board\AddMemberUseCase;
use SimpleKanban\Kanban\UseCase\Board\AddMemberRequest;
use SimpleKanban\Kanban\Model\Board\Board;
use SimpleKanban\Kanban\Model\Board\BoardId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AddMemberUseCaseSpec extends ObjectBehavior
{
    function it_handles_add_member_use_case(AddMemberRequest $request, BoardGateway $boardGateway)
    {
        $board = new Board(BoardId::generate(), 'a board');
        $member = new Member('anidentity', 'a firstname' );

        $boardGateway->add($board)->shouldBeCalled();
        $this->handle($request);
    }
}
