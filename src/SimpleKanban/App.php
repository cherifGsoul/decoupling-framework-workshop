<?php

namespace SimpleKanban;

use Yii;
use SimpleKanban\Kanban\Model\Board\BoardGateway;
use SimpleKanban\Kanban\Model\Column\ColumnGateway;
use app\modules\kanban\persistence\gateway\ActiveBoardGateway;
use app\modules\kanban\persistence\gateway\ActiveColumnGateway;
use SimpleKanban\Kanban\UseCase\Board\OpenBoardUseCase;
use SimpleKanban\Kanban\UseCase\Board\CloseBoardUseCase;
use SimpleKanban\Kanban\UseCase\Board\AddColumnUseCase;
use SimpleKanban\Kanban\UseCase\DataTransformer\Board\BoardDataTransformer;
use SimpleKanban\Kanban\UseCase\DataTransformer\Board\BoardDtoDataTransformer;
use SimpleKanban\Kanban\Model\Board\BoardTitleSluggifier;
use SimpleKanban\Kanban\Model\Board\BoardFactory as BoardFactoryInterface;
use SimpleKanban\Kanban\Model\Column\ColumnFactory as ColumnFactoryInterface;
use app\modules\kanban\services\YiiBoardTitleSluggifier;
use app\modules\kanban\model\BoardFactory;
use app\modules\kanban\model\ColumnFactory;
use SimpleKanban\Common\Infrastructure\UseCase\YiiDbSession;
use SimpleKanban\Common\UseCase\TransactionalSession;
use SimpleKanban\Common\UseCase\TransactionalUseCase;


class App
{
  public static function bootstrap(array $config)
  {
    $container = Yii::$container;


    $container->set(TransactionalSession::class, function($container){
      return new YiiDbSession(Yii::$app->db);
    });

    $container->set(BoardTitleSluggifier::class, function($container){
      return new YiiBoardTitleSluggifier();
    });

    $container->set(BoardFactoryInterface::class, function($container){
      return new BoardFactory();
    });

    $container->set(ColumnFactoryInterface::class, function($container){
      return new ColumnFactory();
    });

    $container->set(BoardDataTransformer::class, function($container){
      return new BoardDtoDataTransformer();
    });


    $container->set(BoardGateway::class, function($container) {
      return new ActiveBoardGateway($container->get(BoardFactoryInterface::class));
    });

    $container->set(ColumnGateway::class, function($container) {
      return new ActiveColumnGateway($container->get(ColumnFactoryInterface::class));
    });

    $container->set('OpenBoardUseCase', function($container) {

      $useCase =  new OpenBoardUseCase(
          $container->get(BoardGateway::class), 
          $container->get(BoardDataTransformer::class),
          $container->get(BoardTitleSluggifier::class)
        );
      return new TransactionalUseCase($useCase, $container->get(TransactionalSession::class));
    });

    $container->set('CloseBoardUseCase', function($container) {
      $useCase = new CloseBoardUseCase(
          $container->get(BoardGateway::class), 
          $container->get(BoardDataTransformer::class)
        );
      return new TransactionalUseCase($useCase, $container->get(TransactionalSession::class));
    });

    $container->set('AddColumnUseCase', function($container) {
      $useCase = new AddColumnUseCase(
          $container->get(BoardGateway::class), 
          $container->get(ColumnGateway::class), 
          $container->get(BoardDataTransformer::class)
      );
      return new TransactionalUseCase($useCase, $container->get(TransactionalSession::class));
    });

    (new \yii\web\Application($config))->run();
  }
}