<?php

use app\models\Wynik;
use common\components\StringConverter;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Zestaw */

$this->title = 'Tryb sprawdzania';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-trybNauki" align="center">
    <h1 align="center"><?= Html::encode($this->title) ?></h1>
    <br><br>
    <a href="/zestaw/lang1-lang2?id=<?php echo $model->id ?>&alg=1&save=1" class="btn btn-primary" role="button"
       style="margin-right: 15px">Angielski => Polski</a>
    <a href="/zestaw/mix?id=<?php echo $model->id ?>&alg=3&save=1" class="btn btn-primary" role="button"
       style="margin-right: 15px">Mieszane</a>
    <a href="/zestaw/lang2-lang1?id=<?php echo $model->id ?>&alg=1&save=1" class="btn btn-primary" role="button"
       style="margin-right: 15px">Polski => Angielski</a>

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