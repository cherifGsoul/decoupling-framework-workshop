<?php

namespace app\modules\api\controllers;

use Yii;
use yii\rest\Controller;
use app\models\LoginForm;
use yii\web\ServerErrorHttpException;

class SessionController extends Controller
{
	public function verbs()
	{
		return [
			'index' => ['GET'],
			'create' => ['POST'],
			'delete' => ['DELETE']
		];
	}

	public function actionIndex()
	{
		if (!Yii::$app->user->isGuest) {
			return ['user' => $this->serializeUser(Yii::$app->user->identity)];
		}
		
	}

	public function actionCreate()
	{
		if (!Yii::$app->user->isGuest) {
            return ['user' => $this->serializeUser(Yii::$app->user->identity)];
        }

        $model = new LoginForm();
        $data = Yii::$app->getRequest()->getBodyParams();
        $user = $data['user'] ? $data['user'] : [];
        if ($model->load($user, '') && $model->login()) {
        	$response = Yii::$app->getResponse();
            $response->setStatusCode(201);
        } elseif (!$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
        }
        return ['user' => $this->serializeUser(Yii::$app->user->identity)];
	}

	public function actionDelete()
	{
		if (!Yii::$app->user->isGuest) {
			$response = Yii::$app->getResponse();
        	$response->setStatusCode(201);
			Yii::$app->user->logout();
		}
		
	}

	private function serializeUser($user)
	{
		return [
			'id' => $user->id,
			'username' => $user->username,
			'email' => $user->email
		];
	}
}