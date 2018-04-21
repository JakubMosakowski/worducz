<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Podkategoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="podkategoria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kategoria_id')->textInput() ?>

    <?= $form->field($model, 'nazwa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'opis')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'obrazek')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
