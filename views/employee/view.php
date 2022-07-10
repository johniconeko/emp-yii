<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */

$this->title = $model->EMP_ID;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="employee-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'EMP_ID' => $model->EMP_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'EMP_ID' => $model->EMP_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'EMP_ID',
            'LAST_NAME',
            'FIRST_NAME',
            'MIDDLE_NAME',
            'BIRTH_DATE',
            'OFFICE_ID',
        ],
    ]) ?>

    <h3>Children</h3>

    <?= GridView::widget([
        'dataProvider' => $model->familyDataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CHILD_ID',
            'child.FIRST_NAME',
            'child.MIDDLE_NAME',
            'child.LAST_NAME',
        ],
    ]); ?>

</div>
