<?php

namespace SimpleKanban\Common\UseCase;

interface TransactionalSession
{
  /**
   * Undocumented function
   *
   * @param callable $operation
   * @return void
   */
  public function commit(callable $operation);
}