<?php

namespace SimpleKanban\Module\Kanban\persistence\gateway;

use SimpleKanban\Module\Kanban\persistence\records\BoardRecord;
use SimpleKanban\Core\Kanban\Model\Board\BoardGateway;

class ActiveBoardGateway implements BoardGateway
{


  public function persist(Board $board)
  {
    $record = new BoardRecord;
    
    $record->setAttributes([
      'title' => $board->title
    ], false);

    $record->save(false);
  }

  public function nextIdentity()
  {

  }
}