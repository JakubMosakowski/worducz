<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Konto */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Konta', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="konto-view">

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

</div>
