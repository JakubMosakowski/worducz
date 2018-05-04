<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Podkategoria */

$this->title = 'Zaktualizuj podkategorię: '.$model->nazwa;
$this->params['breadcrumbs'][] = ['label' => 'Podkategorie', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nazwa, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Aktualizuj';
?>
<div class="podkategoria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'kategorie'=> $kategorie,
    ]) ?>

</div>
