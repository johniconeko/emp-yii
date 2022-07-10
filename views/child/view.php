<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model app\models\Child */

$this->title = $model->CHILD_ID;
$this->params['breadcrumbs'][] = ['label' => 'Children', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="child-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'CHILD_ID' => $model->CHILD_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'CHILD_ID' => $model->CHILD_ID], [
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
            'CHILD_ID',
            'LAST_NAME',
            'FIRST_NAME',
            'MIDDLE_NAME',
            'BIRTH_DATE',
        ],
    ]) ?>

    <h3>Parents</h3>

    <?= GridView::widget([
        'dataProvider' => $model->familyDataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CHILD_ID',
            'parent.FIRST_NAME',
            'parent.MIDDLE_NAME',
            'parent.LAST_NAME',
        ],
    ]); ?>

</div>
