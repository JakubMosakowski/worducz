<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Rola */

$this->title = $model->nazwa;
$this->params['breadcrumbs'][] = ['label' => 'Rolas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rola-view">

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
           // 'id',
            'nazwa',
            [
                'attribute' => 'opis',
                'options'=>['style'=>'word-wrap:break-word;width:30px;']
            ],
        ],
    ]) ?>

</div>
