<?php

namespace app\modules\api\actions\board;

use Yii;
use yii\base\Action;


class OpenBoardAction extends Action
{
	public function init()
	{
		$this->useCase = Yii::$container->get('openBoardUseCase');
	}

	public function run()
	{
		$model = new BoardForm();
		$model->load(Yii::$app->request->getBodyParams(), true);
		if( $model->validate()) {
			$request = new Request($model->title);
			try {
				$responseData = $this->useCase->handle($request);
				$response = Yii::$app->getResponse();
            	$response->setStatusCode(201);
            	$resource = BoardResource::fromDto($responseData);
            	$id = $resource->id;
            	$response->getHeaders()->set('Location', Url::toRoute(['api/boards', 'id' => $id], true));
            	return $resource;
			} catch (Exception $e) {
				throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
			}
		} 

		if(!$model->hasErrors()){
			throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
		} 

		return $model;
	}
}