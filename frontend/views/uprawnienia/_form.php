<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Uprawnienia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="uprawnienia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'konto_id')->textInput() ?>

    <?= $form->field($model, 'podkategoria_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Zapisz', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
