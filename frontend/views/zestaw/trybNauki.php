<?php

use common\components\ArraysPrinter;
use common\components\StringConverter;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Zestaw */

$this->title = 'Zestawy';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-trybSprawdzania" align="center">

    <button id="hideButton" onClick="hideButton()" class="btn btn-primary btn-lg">Pokaż zestaw</button>


    <div class="buttonsSpacing" style="text-align: center">
        </br>
        <?= Html::a('Angielski => Polski', ['lang1-lang2', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <div class="separator"></div>
        <?= Html::a('Mieszane', ['mix', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <div class="separator"></div>
        <?= Html::a('Polski => Angielski', ['lang2-lang1', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </div>

    <div id="arrayTabela" style="visibility: hidden">
        <?php
        $sconv = new StringConverter();
        $array = $sconv->convertStringToArray($model->zestaw);
        ArraysPrinter::printTwoDimArray($array);
        ?>
    </div>
    <script type="text/javascript">
        function hideButton() {
            var visibility = document.getElementById('arrayTabela').style.visibility;
            if (visibility == "hidden") {
                document.getElementById('arrayTabela').style.visibility = "visible";
                document.getElementById('hideButton').textContent = "Schowaj zestaw";
            } else {
                document.getElementById('arrayTabela').style.visibility = "hidden";
                document.getElementById('hideButton').textContent = "Pokaż zestaw";

            }
        }

    </script>
</div>