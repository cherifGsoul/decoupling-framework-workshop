<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Column;
use app\models\Board;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Column */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="column-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'board_id')->dropDownList(
        ArrayHelper::map(Board::find()->all(), 'id','title'),
        [
            'prompt' => '-- Select a project -- '
        ]
    ) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
