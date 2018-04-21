<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PodkategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Podkategorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="podkategoria-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Podkategoria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'kategoria_id',
            'nazwa',
            'opis:ntext',
            'obrazek',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
