<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Zestaw */

$this->title = 'Update Zestaw: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Zestaws', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="zestaw-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'podkategorie' =>$podkategorie,
    ]) ?>

</div>
