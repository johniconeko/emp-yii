<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Office */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="office-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'OFFICE_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OFFICE_LOCATION')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('SUBMIT', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
