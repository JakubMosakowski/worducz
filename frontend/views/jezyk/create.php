<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Jezyk */

$this->title = 'Stwórz język';
$this->params['breadcrumbs'][] = ['label' => 'Języki', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jezyk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
