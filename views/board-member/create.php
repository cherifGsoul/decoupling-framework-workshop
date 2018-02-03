<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BoardMember */

$this->title = 'Create Board Member';
$this->params['breadcrumbs'][] = ['label' => 'Board Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="board-member-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
