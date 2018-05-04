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
$podkategoriaNazwa = Podkategoria::findOne($model->podkategoria_id)->nazwa;
$kategoriaId = Podkategoria::findOne($model->podkategoria_id)->kategoria_id;
$kategoriaNazwa = Kategoria::findOne($kategoriaId)->nazwa;
$this->params['breadcrumbs'][] = ['label' => $kategoriaNazwa, 'url' => ['/kategoria/view', 'id' => $kategoriaId]];
$this->params['breadcrumbs'][] = ['label' => $podkategoriaNazwa, 'url' => ['/podkategoria/view', 'id' => $model->podkategoria_id]];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-view">
    <h1 align="center"><?= Html::encode($this->title) ?></h1>
    <br><br>
    <div class="row">

        <div class="media">
            <a href="/zestaw/tryb-nauki?id=<?php echo $model->id ?>" class="pull-left">
                <img src="/uploads/others/one.jpg"/>
            </a>
            <div class="media-body">
                <h2>Naucz się słówek</h2>
                <h4>- uzyskane przez Ciebie wyniki NIE BĘDĄ zapisywały się na Twoim koncie</h4>
            </div>
        </div>

        <div class="media">
            <a href="/zestaw/tryb-nauki?id=<?php echo $model->id ?>" class="pull-left">
                <img src="/uploads/others/two.jpg"/>
            </a>
            <div class="media-body">
                <h2>Sprawdź się</h2>
                <h4>- uzyskane przez Ciebie wyniki BĘDĄ zapisywały się na Twoim koncie</h4>
            </div>
        </div>

    </div>


</div>
