<?php

namespace app\commands;

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
            //'auth_key' => $this->string(32)->notNull(),
            'password_hash' => Faker::password(),
            //'password_reset_token' => $this->string()->unique(),
            'email' => Faker::email(),
            //'status' => $this->smallInteger()->notNull()->defaultValue(10),
            //'created_at' => $this->integer()->notNull(),
            //'updated_at' => $this->integer()->notNull(),
        ]);
    }
}