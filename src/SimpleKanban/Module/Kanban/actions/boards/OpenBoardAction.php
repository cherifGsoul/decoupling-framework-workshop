<?php

namespace SimpleKanban\Module\kanban\actions\boards;

use Yii;
use yii\base\Action;
use SimpleKanban\Core\Kanban\UseCase\OpenBoardRequest;
use SimpleKanban\Module\Kanban\forms\BoardForm;

class OpenBoardAction extends Action
{

  private $useCase;

  public function init()
  {
    $this->useCase = Yii::$container->get('openBoardUseCase');
  }

  public function run()
  {
    $model = new BoardForm();
    
    if ($model->load(Yii::$app->request->post())) {
      
      $request = new OpenBoardRequest($model->title);
      $this->useCase->handle($request);

      return $this->redirect(['view', 'id' => $model->id]);
    }
    
    return $this->controller->render('open', [
      'model' => $model
    ]);
  }
}