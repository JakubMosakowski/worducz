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
        <?= Html::a('Tryb nauki', ['zestaw/tryb-nauki', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Tryb sprawdzania', ['zestaw/tryb-sprawdzania', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>


</div>
