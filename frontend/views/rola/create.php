<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Rola */

$this->title = 'Stwórz rolę';
$this->params['breadcrumbs'][] = ['label' => 'Role', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rola-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
