<?php

use common\components\StringConverter;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Zestaw */

$this->title = 'Dodaj zestaw';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-userZestaw">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'nazwa')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'podkategoria_id')->dropDownList($podkategorie) ?>


    <?= $form->field($model, 'zestaw')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton('Zapisz', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
