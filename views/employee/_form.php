<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'LAST_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FIRST_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MIDDLE_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BIRTH_DATE')->textInput() ?>

    <?php
 
    $listData=ArrayHelper::map($office,'OFFICE_ID','OFFICE_NAME');

    echo $form->field($model, 'OFFICE_ID')->dropDownList(
            $listData,
            ['prompt'=>'Select...']
            );
    ?>
    
    <?php //<?= $form->field($model, 'OFFICE_ID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
