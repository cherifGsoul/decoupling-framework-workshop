<?php

//namespace SimpleKanban;

//use Yii;
use SimpleKanban\Kanban\Model\Board\BoardGateway;
use SimpleKanban\Module\Kanban\persistence\gateway\ActiveBoardGateway;
use SimpleKanban\Kanban\UseCase\Board\OpenBoardUseCase;

class App
{
  public static function bootstrap(array $config)
  {
    $container = Yii::$container;

    $container->set(BoardGateway::class, function($container) {
      return new ActiveBoardGateway();
    });

    $container->set('openBoardUseCase', function($container) {
      return new OpenBoardUseCase($container->get(BoardGateway::class));
    });

    (new \yii\web\Application($config))->run();
  }
}