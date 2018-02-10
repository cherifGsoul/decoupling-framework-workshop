<?php

namespace SimpleKanban\Common\UseCase;

class TransactionalUseCase implements UseCase
{
  /**
   * Undocumented variable
   *
   * @var [type]
   */
  private $useCase;
  /**
   * Undocumented variable
   *
   * @var [type]
   */
  private $session;

  /**
   * Undocumented function
   *
   * @param UseCase $useCase
   * @param TransactionalSession $session
   */
  public function __construct(UseCase $useCase, TransactionalSession $session)
  {
    $this->useCase = $useCase;
    $this->session = $session;
  }

  /**
   * Undocumented function
   *
   * @param [type] $request
   * @return void
   */
  public function handle($request)
  {
    $operation = function() use ($request) {
      return $this->useCase->handle($request);
    };
    return $this->session->commit($operation);
  }
}