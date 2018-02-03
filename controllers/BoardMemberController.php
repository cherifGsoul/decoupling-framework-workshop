<?php

namespace app\controllers;

use Yii;
use app\models\BoardMember;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BoardMemberController implements the CRUD actions for BoardMember model.
 */
class BoardMemberController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all BoardMember models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => BoardMember::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BoardMember model.
     * @param integer $board_id
     * @param integer $member_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($board_id, $member_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($board_id, $member_id),
        ]);
    }

    /**
     * Creates a new BoardMember model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($boardId)
    {
        $model = new BoardMember();
        $model->board_id = $boardId;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['board/view', 'id' => $model->board_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BoardMember model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $board_id
     * @param integer $member_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($board_id, $member_id)
    {
        $model = $this->findModel($board_id, $member_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'board_id' => $model->board_id, 'member_id' => $model->member_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BoardMember model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $board_id
     * @param integer $member_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($board_id, $member_id)
    {
        $this->findModel($board_id, $member_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BoardMember model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $board_id
     * @param integer $member_id
     * @return BoardMember the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($board_id, $member_id)
    {
        if (($model = BoardMember::findOne(['board_id' => $board_id, 'member_id' => $member_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
