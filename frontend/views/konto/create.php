<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Konto */

$this->title = 'Create Konto';
$this->params['breadcrumbs'][] = ['label' => 'Kontos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="konto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
