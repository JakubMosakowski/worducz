<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Podkategoria */

$this->title = 'Update Podkategoria: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Podkategorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="podkategoria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
