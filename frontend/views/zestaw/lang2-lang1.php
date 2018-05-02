<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */


$this->title = 'Polski => Angielski';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-lang2-lang1">

    <p>
    <h1 align="center"><?= Html::encode($this->title) ?></h1>
    <?php
    if (isset($_GET['alg'])) {
        $alg = $_GET['alg'];
    } else
        $alg = 1;
    if (isset($_GET['save'])) {
        $save = $_GET['save'];
    } else
        $save = 0;

    ?>
    <?= $this->render('_formQuestion', [
        'model' => $model,
        'firstLang' => 1,
        'algorithmNumber' => $alg,
        'save' => $save,
    ]) ?>

    </p>
</div>
