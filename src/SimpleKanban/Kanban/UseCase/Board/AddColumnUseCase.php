<?php

namespace SimpleKanban\Kanban\UseCase\Board;

use SimpleKanban\Kanban\Model\Column\Column;
use SimpleKanban\Kanban\Model\Board\BoardGateway;
use SimpleKanban\Kanban\Model\Column\ColumnGateway;
use SimpleKanban\Common\UseCase\UseCase;
use SimpleKanban\Kanban\Model\Board\BoardId;
use SimpleKanban\Kanban\UseCase\DataTransformer\Board\BoardDataTransformer;

class AddColumnUseCase implements UseCase
{
    private $boardGateway;
    private $columnGateway;
    private $boardDataTransformer;

    public function __construct(
        BoardGateway $boardGateway, 
        ColumnGateway $columnGateway, 
        BoardDataTransformer $boardDataTransformer
    )
    {
        $this->boardGateway = $boardGateway;
        $this->columnGateway = $columnGateway;
        $this->boardDataTransformer = $boardDataTransformer;
    }

    public function handle($request)
    {
        $board = $this->boardGateway->forId(BoardId::fromString($request->getBoardId()));

        if (!$board) {
            throw new \Exception('The requested board dosent exist');
        }

        $column = new Column($this->columnGateway->nextIdentity(), $request->getColumnTitle(), $board->getId());
        $board->addColumn($column);
        
        $this->boardGateway->persist($board);    
        
        

        $this->boardDataTransformer->write($board);
        return $this->boardDataTransformer->read();
    }
}
