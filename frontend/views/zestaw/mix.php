<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */


$this->title = 'Mieszane';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-mix">
    <h1 align="center"><?= Html::encode($this->title) ?></h1>
    <?php
    $alg = $_GET['alg'];
    $save = $_GET['save'];

    ?>
    <?= $this->render('_formQuestion', [
        'model' => $model,
        'firstLang' => 1,
        'algorithmNumber' => $alg,
        'save' => $save,
    ]) ?>



</div>
