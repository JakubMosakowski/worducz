<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Konto */

$this->title = 'Zaktualizuj konto: '.$model->nazwa;
$this->params['breadcrumbs'][] = ['label' => 'Konta', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Aktualizuj';
?>
<div class="konto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
