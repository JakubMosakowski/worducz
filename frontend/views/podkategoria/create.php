<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Podkategoria */

$this->title = 'Stwórz podkategorię';
$this->params['breadcrumbs'][] = ['label' => 'Podkategorie', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="podkategoria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'kategorie'=> $kategorie,
    ]) ?>

</div>
