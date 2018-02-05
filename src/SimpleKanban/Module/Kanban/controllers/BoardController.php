<?php

namespace SimpleKanban\Module\Kanban\controllers;

use SimpleKanban\Module\Kanban\actions\boards\OpenBoardAction;


class BoardController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'open' => [
                'class' => OpenBoardAction::className()
            ] 
        ];
    }
    /*
    public function actionAddColumn()
    {
        return $this->render('add-column');
    }

    public function actionAddMember()
    {
        return $this->render('add-member');
    }

    public function actionClose()
    {
        return $this->render('close');
    }
    */
}
