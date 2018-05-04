<?php

use app\models\Kategoria;
use app\models\Konto;
use app\models\Podkategoria;
use common\components\ArraysPrinter;
use common\components\StringConverter;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Zestaw */

$this->title = $model->nazwa;
$podkategoriaNazwa=Podkategoria::findOne($model->podkategoria_id)->nazwa;
$kategoriaId=Podkategoria::findOne($model->podkategoria_id)->kategoria_id;
$kategoriaNazwa=Kategoria::findOne($kategoriaId)->nazwa;
$this->params['breadcrumbs'][] = ['label' => $kategoriaNazwa, 'url' => ['/kategoria/view', 'id' => $kategoriaId]];
$this->params['breadcrumbs'][] = ['label' => $podkategoriaNazwa, 'url' => ['/podkategoria/view', 'id' => $model->podkategoria_id]];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-view" align="center">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Tryb nauki', ['zestaw/tryb-nauki', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Tryb sprawdzania', ['zestaw/tryb-sprawdzania', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>


</div>
