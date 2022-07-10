<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Child */

$this->title = 'Update Child: ' . $model->CHILD_ID;
$this->params['breadcrumbs'][] = ['label' => 'Children', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CHILD_ID, 'url' => ['view', 'CHILD_ID' => $model->CHILD_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="child-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
