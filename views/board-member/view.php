<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BoardMember */

$this->title = $model->member->email;
$this->params['breadcrumbs'][] = ['label' => 'Board Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="board-member-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'board_id' => $model->board_id, 'member_id' => $model->member_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'board_id' => $model->board_id, 'member_id' => $model->member_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'board.title',
            'member.email',
        ],
    ]) ?>

</div>
