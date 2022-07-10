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

    <div class="form-group field-child-birth_date required">
        <label class="control-label" for="child-birth_date">Birth Date</label>
        <input type="date" id="child-BIRTH_DATE" value='<?= $model->BIRTH_DATE ?>' class="form-control" name="Child[BIRHT_DATE]" aria-required="true">
        <div class="help-block"></div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
