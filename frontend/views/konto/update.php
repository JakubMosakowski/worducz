<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Konto */

$this->title = 'Zaktualizuj konto: '.$model->username;
$this->params['breadcrumbs'][] = ['label' => 'Konta', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->username]];
$this->params['breadcrumbs'][] = 'Aktualizuj';
?>
<div class="konto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'imie')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'nazwisko')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'rola_id')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'email') ?>


    <div class="form-group">
        <?= Html::submitButton('Zapisz', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>


    <?php ActiveForm::end(); ?>


</div>
