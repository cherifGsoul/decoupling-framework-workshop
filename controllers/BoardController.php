<?php

namespace app\controllers;

use Yii;
use app\models\Board;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Column;
use app\models\BoardMember;
use app\models\User;
use app\models\AddBoardMemberForm;


/**
 * BoardController implements the CRUD actions for Board model.
 */
class BoardController extends Controller
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
     * Lists all Board models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Board::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Board model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $columnsDataProvider =new ActiveDataProvider([
            'query' => Column::find()->where([
                'board_id' => $id
            ])
        ]);

        $membersDataProvider = new ActiveDataProvider([
            'query' => BoardMember::find()->where([
                'board_id' => $id
            ])
        ]);
            
        return $this->render('view', [
            'model' => $this->findModel($id),
            'columnsDataProvider' => $columnsDataProvider,
            'membersDataProvider' => $membersDataProvider
        ]);
    }

    /**
     * Creates a new Board model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Board();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Board model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Board model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionAddMember($boardId)
    {
        $model = new AddBoardMemberForm();
        $board = $this->findModel($boardId);

        $model->boardId = $boardId;
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
            $user = User::findOne([
                'id' => $model->memberId
            ]);

            if (null == $user) {
                throw new NotFoundHttpException('The requested page does not exist.');
            }

            $boardMember = new BoardMember();
            $boardMember->board_id = $model->boardId;
            $boardMember->member_id = $model->memberId;
            $board->link('boardMembers', $boardMember);
            return $this->redirect(['view', 'id' => $board->id]);
        }

        return $this->render('add_member', [
            'model' => $model
        ]);
    }

    /**
     * Finds the Board model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Board the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Board::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
