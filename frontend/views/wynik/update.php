<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Wynik */

$this->title = 'Zaktualizuj wynik: '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Wyniki', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Aktualizuj';
?>
<div class="wynik-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
