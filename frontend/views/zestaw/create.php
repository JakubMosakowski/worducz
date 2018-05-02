<?php

use app\models\Uprawnienia;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Zestaw */

$this->title = 'Utwórz zestaw';
$this->params['breadcrumbs'][] = ['label' => 'Zestawy', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'podkategorie' =>$podkategorie,
    ]) ?>

</div>
