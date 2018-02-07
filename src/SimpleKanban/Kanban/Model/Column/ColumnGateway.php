<?php

namespace SimpleKanban\Kanban\Model\Column;

interface ColumnGateway
{
  public function nextIdentity();

    public function forId(ColumnId $id);
}
