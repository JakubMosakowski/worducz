<?php

use common\components\ArraysPrinter;
use common\components\StringConverter;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Zestaw */

$this->title = 'Tryb nauki';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-trybSprawdzania" align="center">

    <button id="hideButton" onClick="hideButton()" class="btn btn-info btn-lg">Pokaż zestaw</button>
    <br><br>
    <div class="btn-group">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">
                Angielski => Polski
                <span class="caret"></span></button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">

                <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?r=zestaw%2Flang1-lang2&id=<?php echo $model->id ?>&alg=1">Pytaj raz!</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?r=zestaw%2Flang1-lang2&id=<?php echo $model->id ?>&alg=2">Pytaj wielokrotnie!</a></li>
            </ul>
        </div>
    </div>

    <div class="separator"></div>

    <div class="btn-group">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" id="menu2" type="button" data-toggle="dropdown">Mieszane
                <span class="caret"></span></button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="menu2">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?r=zestaw%2Fmix&id=<?php echo $model->id ?>&alg=3">Przygotuj do sprawdzianu!</a></li>
                </ul>
        </div>
    </div>

    <div class="separator"></div>

    <div class="btn-group">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" id="menu3" type="button" data-toggle="dropdown">Polski
                => Angielski
                <span class="caret"></span></button>

            <ul class="dropdown-menu" role="menu" aria-labelledby="menu3">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?r=zestaw%2Flang2-lang1&id=<?php echo $model->id ?>&alg=1">Pytaj raz!</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?r=zestaw%2Flang2-lang1&id=<?php echo $model->id ?>&alg=2">Pytaj wielokrotnie!</a></li>
            </ul>
        </div>
    </div>
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