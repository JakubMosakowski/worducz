<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Wynik */

$this->title = 'Stwórz wynik';
$this->params['breadcrumbs'][] = ['label' => 'Wyniki', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wynik-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
