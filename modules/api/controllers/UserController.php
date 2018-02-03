<?php

namespace app\modules\api\controllers;

use yii\rest\ActiveController;


class UserController extends ActiveController
{
  public $modelClass = 'app\models\User' ;
}