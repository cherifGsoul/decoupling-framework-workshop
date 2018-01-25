<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Column */

$this->title = 'Create Column';
$this->params['breadcrumbs'][] = ['label' => 'Columns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="column-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
