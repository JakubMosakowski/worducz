<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JezykSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Języki';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jezyk-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Stwórz język', ['create'], ['class' => 'btn btn-success']) ?>
        Test echo
        Test echo2
        Test 3
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nazwa',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
