<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Konto */

$this->title = 'Update Konto: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Kontos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="konto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
