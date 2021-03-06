<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jezyk */

$this->title = 'Zaktualizuj język: '.$model->nazwa;
$this->params['breadcrumbs'][] = ['label' => 'Języki', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->nazwa]];
$this->params['breadcrumbs'][] = 'Aktualizuj';
?>
<div class="jezyk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
