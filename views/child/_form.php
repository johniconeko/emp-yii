<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Child */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="child-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'LAST_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FIRST_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MIDDLE_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BIRTH_DATE')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
