<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Wynik */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Wyniki', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wynik-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Aktualizuj', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Usuń', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Na pewno chcesz to usunąć?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            [
                'label' => 'Uzytkownik',
                'attribute' => 'konto.username'
            ],
            [
                'label' => 'Zestaw',
                'attribute' => 'zestaw.nazwa'
            ],
            'data_wyniku',
            'wynik',
        ],
    ]) ?>

</div>
