<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PodkategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Podkategorie';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="podkategoria-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Stwórz podkategorię', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'label' => 'Nazwa kategorii',
                'attribute' => 'kategoria.nazwa'
            ],
            'nazwa',
            'opis:ntext',
            [
                'label' => 'Obrazek',
                'attribute' => 'obrazek',
                'format' => 'html',
                'value' => function ($model) {
                    return yii\bootstrap\Html::img($model->obrazek, ['width' => '75']);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
