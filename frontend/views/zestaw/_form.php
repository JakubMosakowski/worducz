<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Zestaw */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zestaw-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'nazwa')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'podkategoria_id')->dropDownList($podkategorie) ?>


    <?= $form->field($model, 'zestaw')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton('Zapisz', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
