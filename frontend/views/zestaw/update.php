<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Zestaw */

$this->title = 'Zaktualizuj zestaw: '.$model->nazwa;
$this->params['breadcrumbs'][] = ['label' => 'Zestawy', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nazwa, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Aktualizuj';
?>
<div class="zestaw-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'podkategorie' =>$podkategorie,
    ]) ?>

</div>
