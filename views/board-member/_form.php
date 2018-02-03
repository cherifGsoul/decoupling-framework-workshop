<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\BoardMember */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="board-member-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'board_id')->textInput() ?>

    <?= $form->field($model, 'member_id')->dropDownList(
            ArrayHelper::map(User::find()->all(), 'id', 'email'),
            [
                'prompt' => '-- Select a member --'
            ]
        ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
