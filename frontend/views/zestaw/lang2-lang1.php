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
        $alg = $_GET['alg'];
        ?>
        <?= $this->render('_formQuestion', [
            'model' => $model,
            'firstLang' => 1,
            'algorithmNumber' => $alg,
        ]) ?>

    </p>
</div>
