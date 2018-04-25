<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Wynik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wynik-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'konto_id')->textInput() ?>

    <?= $form->field($model, 'zestaw_id')->textInput() ?>

    <?= $form->field($model, 'data_wyniku')->textInput() ?>

    <?= $form->field($model, 'wynik')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Zapisz', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
