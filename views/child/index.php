<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Children';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="child-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Child', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CHILD_ID',
            'LAST_NAME',
            'FIRST_NAME',
            'MIDDLE_NAME',
            'BIRTH_DATE',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action,  $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'CHILD_ID' => $model->CHILD_ID]);
                 }
            ],
        ],
    ]); ?>


</div>
