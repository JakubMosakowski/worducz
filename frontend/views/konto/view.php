<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use miloschuman\highcharts\Highcharts;


/* @var $this yii\web\View */
/* @var $model app\models\Konto */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Konta', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="konto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'rola_id',
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

    $datesArray='sad';
    $scoresArray='asd';
    echo Highcharts::widget([
        'options' => [
            'title' => ['text' => 'Twój progres'],
            'xAxis' => [
                'categories' => ['Apples', 'Bananas', 'Oranges']
            ],
            'yAxis' => [
                'title' => ['text' => 'Zdobyte procenty']
            ],
            'series' => [
                ['name' => $model->username, 'data' => [ 7, 3]]
            ]
        ]
    ]);
    ?>



</div>
