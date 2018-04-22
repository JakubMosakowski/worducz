<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Zestaw */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Zestaws', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'konto_id',
            [
                'label' => 'Twórca',
                'attribute' => 'konto.username'
            ],
            //'jezyk1_id',
            //'jezyk2_id',
            [
                'label' => 'Nazwa podkategorii',
                'attribute' => 'podkategoria.nazwa'
            ],
            'nazwa',
            'zestaw:ntext',
            'ilosc_slowek',
            'data_dodania',
            'data_edycji',
        ],
    ]) ?>

</div>
