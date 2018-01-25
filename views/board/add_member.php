<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\AddBoardMemberForm */
/* @var $form ActiveForm */
?>
<div class="board-add_member">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'boardId')->textInput() ?>
        <?= $form->field($model, 'memberId')->dropDownList(
            ArrayHelper::map(User::find()->all(), 'id', 'email'),
            [
                'prompt' => '-- Select a member --'
            ]
        ) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- board-add_member -->
