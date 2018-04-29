<?php

use common\components\StringConverter;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Zestaw */

$this->title = 'Angielski => Polski';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-lang1-lang2">


    <p>
    <h1 align="center"><?= Html::encode($this->title) ?></h1>

    <?php
        $alg = $_GET['alg'];
        ?>
        <?= $this->render('_formQuestion', [
            'model' => $model,
            'firstLang' => 0,
            'algorithmNumber' => $alg,
        ]) ?>

    </p>

</div>