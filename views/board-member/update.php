<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BoardMember */

$this->title = 'Update Board Member: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Board Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->board_id, 'url' => ['view', 'board_id' => $model->board_id, 'member_id' => $model->member_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="board-member-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
