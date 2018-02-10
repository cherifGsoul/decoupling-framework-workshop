<?php

namespace app\modules\api\controllers;

use Yii;
use yii\rest\Controller;
use SimpleKanban\Kanban\Model\Board\BoardGateway;
use SimpleKanban\Kanban\UseCase\Board\OpenBoardRequest;
use SimpleKanban\Kanban\UseCase\Board\CloseBoardRequest;
use SimpleKanban\Kanban\UseCase\Board\AddColumnRequest;
use app\modules\kanban\forms\BoardForm;
use app\modules\kanban\forms\OpenBoardForm;
use app\modules\kanban\forms\ColumnForm;
use yii\base\DynamicModel;
use yii\helpers\Url;
use yii\web\ServerErrorHttpException;

class BoardController extends Controller
{
	public function verbs()
	{
		[
			'open' => ['POST'],
			'close' => ['PUT']
		];
	}

	public function actionOpen()
	{
		$model = new OpenBoardForm();
		$container = Yii::$container;
		$model->load(Yii::$app->getRequest()->getBodyParams(), '');

		

		if( $model->validate()) {
			$request = new OpenBoardRequest($model->title);
			
			$useCase = $container->get('OpenBoardUseCase');

			try {
				$responseData = $useCase->handle($request);
				$response = Yii::$app->getResponse();
            	$response->setStatusCode(201);
            	$resource = new DynamicModel($responseData);
            	$id = $resource->id;
            	$response->getHeaders()->set('Location', Url::toRoute(['view', 'id' => $id], true));
            	return $resource;
			} catch (Exception $e) {
				throw new ServerErrorHttpException($e->getMessage());
			}
		} 

		if(!$model->hasErrors()){
			throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
		} 

		return $model;
	}

	public function actionClose($boardId)
	{
		$model = new BoardForm();
		$container = Yii::$container;
		$model->load(Yii::$app->getRequest()->getBodyParams(), '');
		
		if ($model->validate()) {
			$request = new CloseBoardRequest($model->id);
			$useCase = $container->get('CloseBoardUseCase');

			try {
				$responseData = $useCase->handle($request);
				$response = Yii::$app->getResponse();
				$response->setStatusCode(204);
			} catch (\Exception $e) {
				throw new ServerErrorHttpException($e->getMessage());
			}
		}
	}

	public function actionAddColumn($id)
	{
		$model = new ColumnForm;
		$container = Yii::$container;
		$model->load(Yii::$app->getRequest()->getBodyParams(), '');
		$model->boardId = $id;

		if ($model->validate()) {
			$request = new AddColumnRequest($model->boardId, $model->title);
			$useCase = $container->get('AddColumnUseCase');

			try {
				$responseData = $useCase->handle($request);
				$response = Yii::$app->getResponse();
				$response->setStatusCode(201);
				$resource = new DynamicModel($responseData);
            	$id = $resource->id;
				$response->getHeaders()->set('Location', Url::toRoute(['view', 'id' => $id], true));
				return $responseData;
			} catch (\Exception $e) {
				
			}
		}

		if(!$model->hasErrors()){
			throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
		}

		return $model;
	}
}