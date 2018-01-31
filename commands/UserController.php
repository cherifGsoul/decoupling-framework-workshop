<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use League\FactoryMuffin\Faker\Facade as Faker;
use League\FactoryMuffin\FactoryMuffin;
use app\models\User;

class UserController extends Controller
{
    private $fm;

    public function actionIndex()
    {
        $this->defineData();
        $users = $this->fm->seed(5,User::className());
        foreach ($users as $user) {
            $user->save(false);
        }
        
    }

    private function defineData()
    {
        $this->fm = new FactoryMuffin();
        Faker::setLocale('en_EN');

        return $this->fm->define(User::className())->setDefinitions([
            'username' => Faker::username(),            
            'password_hash' => Yii::$app->security->generatePasswordHash('azerty'),
            'email' => Faker::email()
        ]);
    }
}