<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Konto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="konto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'imie')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'nazwisko')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'rola_id')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Zapisz', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
