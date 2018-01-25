<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Board */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Boards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="board-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Add column', ['column/create', 'boardId' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Add Member', ['add-member', 'boardId' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <h1><?= Html::encode("Columns") ?></h1>

    <?= GridView::widget([
        'dataProvider' => $columnsDataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <h1><?= Html::encode("Members") ?></h1>
    <?= GridView::widget([
        'dataProvider' => $membersDataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'member.email',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
