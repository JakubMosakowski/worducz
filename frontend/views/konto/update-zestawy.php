<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Zestaw */

$this->title = 'Zaktualizuj zestaw: '.$model->nazwa;
$this->params['breadcrumbs'][] = ['label' => Yii::$app->user->identity->username, 'url' => ['view', 'id' => Yii::$app->user->identity->getId()]];
$this->params['breadcrumbs'][] = ['label' => 'Twoje zestawy', 'url' => 'user-zestawy'];
$this->params['breadcrumbs'][] = 'Aktualizuj';
?>
<div class="konto-update-zestawy">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nazwa')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton('Zapisz', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>


    <?php ActiveForm::end(); ?>


</div>
