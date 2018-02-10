<?php

namespace SimpleKanban\Common\Infrastructure\UseCase;

use SimpleKanban\Common\UseCase\TransactionalSession;
use yii\db\Connection;

class YiiDbSession implements TransactionalSession
{
  private $db;

  public function __construct(Connection $db)
  {
    $this->db = $db;
  }

  public function commit(callable $operation)
  {
    return $this->db->transaction($operation);
  }
}