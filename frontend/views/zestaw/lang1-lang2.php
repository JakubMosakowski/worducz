<?php

use common\components\StringConverter;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Zestaw */

$this->title = 'Zestawy';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-lang1-lang2">


    <p>
        <?= $this->render('_formQuestion', [
            'model' => $model,
        ]) ?>
    </p>


</div>