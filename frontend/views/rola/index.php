<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RolaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Role';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rola-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Stwórz rolę', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nazwa',
            [
                'attribute' => 'opis',
                'contentOptions' => ['style' => 'width: 50%; overflow: auto;word-wrap: break-word;white-space:pre-line;'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
