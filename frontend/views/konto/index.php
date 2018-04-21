<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KontoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kontos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="konto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Konto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'rola_id',
            'imie',
            'nazwisko',
            'email:email',
            //'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            //'status',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
