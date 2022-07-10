<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Office */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="office-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'OFFICE_NAME')->textInput(['maxlength' => true]) ?>

    <?php


    
    $listData=ArrayHelper::map($regions,'region_c','region_m');

    echo $form->field($model, 'OFFICE_LOCATION')->dropDownList(
            $listData,
            ['prompt'=>'Select...']
            );
    ?>

    <?php // $form->field($model, 'OFFICE_LOCATION')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('SUBMIT', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
