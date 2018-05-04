<?php

use app\models\Kategoria;
use app\models\Podkategoria;
use app\models\Wynik;
use common\components\StringConverter;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Zestaw */

$this->title = 'Sprawdź się';
$podkategoriaNazwa=Podkategoria::findOne($model->podkategoria_id)->nazwa;
$kategoriaId=Podkategoria::findOne($model->podkategoria_id)->kategoria_id;
$kategoriaNazwa=Kategoria::findOne($kategoriaId)->nazwa;
$this->params['breadcrumbs'][] = ['label' => $kategoriaNazwa, 'url' => ['/kategoria/view', 'id' => $kategoriaId]];
$this->params['breadcrumbs'][] = ['label' => $podkategoriaNazwa, 'url' => ['/podkategoria/view', 'id' => $model->podkategoria_id]];
$this->params['breadcrumbs'][] = ['label' => $model->nazwa, 'url' => ['/zestaw/view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-trybSprawdzenia" align="center">
    <h1 align="center"><?= Html::encode($this->title) ?></h1>
    <h3 align="center">Wybierz sposób sprawdzania Twojej wiedzy:</h3>
    <br><br>
    <a href="/zestaw/lang1-lang2?id=<?php echo $model->id ?>&alg=1&save=1" class="btn btn-primary btn-lg" role="button"
       style="margin-right: 15px">Z angielskiego na polski</a>
    <a href="/zestaw/lang2-lang1?id=<?php echo $model->id ?>&alg=1&save=1" class="btn btn-primary btn-lg" role="button"
       style="margin-right: 15px">Z polskiego na angielski</a>
    <a href="/zestaw/mix?id=<?php echo $model->id ?>&alg=3&save=1" class="btn btn-primary btn-lg" role="button"
       style="margin-right: 15px">Wersja mieszana</a>

    <?php
    if(isset($_GET["save"])) {
        if(!Yii::$app->user->isGuest) {
            $modelWynik = new Wynik();
            $modelWynik->zestaw_id = $model->id;
            $modelWynik->konto_id = Yii::$app->user->id;
            $modelWynik->data_wyniku = date('y-m-d');
            $modelWynik->wynik = $_GET["save"];
            $modelWynik->save();
        }
    }
    ?>
</div>