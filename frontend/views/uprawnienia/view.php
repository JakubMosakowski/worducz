<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Uprawnienia */

$this->title = $model->konto_id;
$this->params['breadcrumbs'][] = ['label' => 'Uprawnienia', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uprawnienia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Aktualizuj', ['update', 'konto_id' => $model->konto_id, 'podkategoria_id' => $model->podkategoria_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Usuń', ['delete', 'konto_id' => $model->konto_id, 'podkategoria_id' => $model->podkategoria_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Jesteś pewien że chcesz to usunąć?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'konto_id',
            'podkategoria_id',
        ],
    ]) ?>

</div>
