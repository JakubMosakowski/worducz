<?php

use common\components\ArraysPrinter;
use common\components\StringConverter;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Zestaw */

$this->title = $model->nazwa;
$this->params['breadcrumbs'][] = ['label' => 'Zestawy', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-view" align="center">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        $sconv = new StringConverter();
        $array = $sconv->convertStringToArray($model->zestaw);
        ArraysPrinter::printTwoDimArray($array);
        ?>
        <?= Html::a('Angielski->Polski', ['lang1-lang2', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Polski->Angielski', ['lang2-lang1', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Mieszane', ['mix', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>


</div>
