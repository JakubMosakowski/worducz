<?php

use common\components\GraphFiller;
use common\components\SqlQueryGenerator;
use common\components\WynikFormatter;
use yii\helpers\Html;
use yii\widgets\DetailView;
use miloschuman\highcharts\Highcharts;


/* @var $this yii\web\View */
/* @var $model app\models\Konto */

$this->title = $model->username;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="konto-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div align="center" style="margin-bottom: 30px">
        <?= Html::a('Obejrzyj swoje zestawy', ['/konto/user-zestawy'], ['class'=>'btn btn-primary']) ?>

    </div>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',

            'imie',
            'nazwisko',
            'email:email',
            'username',
            // 'auth_key',
            //'password_hash',
            // 'password_reset_token',
            //'status',
            //'created_at',
            // 'updated_at',
        ],
    ]) ?>

    <?php
    $graphFiller=new GraphFiller($model->id);
    echo Highcharts::widget([
        'options' => [
            'title' => ['text' => 'Twoje wyniki osiągnięte ze wszystkich sprawdzianów które wypełniłeś'],
            'xAxis' => [
                'title' => ['text' => 'Data/zestaw<br>Podkategoria'],
                'categories' => $graphFiller->resultArray,
            ],
            'yAxis' => [
                'title' => ['text' => 'Zdobyte procenty']
            ],
            'series' => [
                ['name' => $model->username, 'data' => $graphFiller->scoresAsIntegers],
            ]
        ]
    ]);
    ?>


</div>
