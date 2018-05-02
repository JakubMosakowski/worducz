<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Uprawnienia';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uprawnienia-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Dodaj uprawnienia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Konto',
                'attribute' => 'konto.username',
            ],
            [
                'label' => 'Podkategoria',
                'attribute' => 'podkategoria.nazwa',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
