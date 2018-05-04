<?php

use app\models\Kategoria;
use app\models\Podkategoria;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Zestaw */


$this->title = 'Polski => Angielski';
$podkategoriaNazwa=Podkategoria::findOne($model->podkategoria_id)->nazwa;
$kategoriaId=Podkategoria::findOne($model->podkategoria_id)->kategoria_id;
$kategoriaNazwa=Kategoria::findOne($kategoriaId)->nazwa;
$this->params['breadcrumbs'][] = ['label' => $kategoriaNazwa, 'url' => ['/kategoria/view', 'id' => $kategoriaId]];
$this->params['breadcrumbs'][] = ['label' => $podkategoriaNazwa, 'url' => ['/podkategoria/view', 'id' => $model->podkategoria_id]];
$this->params['breadcrumbs'][] = ['label' => $model->nazwa, 'url' => ['/zestaw/view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-lang2-lang1">

    <p>
    <h1 align="center"><?= Html::encode($this->title) ?></h1>
    <?php
    if (isset($_GET['alg'])) {
        $alg = $_GET['alg'];
    } else
        $alg = 1;
    if (isset($_GET['save'])) {
        $save = $_GET['save'];
    } else
        $save = 0;

    ?>
    <?= $this->render('_formQuestion', [
        'model' => $model,
        'firstLang' => 1,
        'algorithmNumber' => $alg,
        'save' => $save,
    ]) ?>

    </p>
</div>
