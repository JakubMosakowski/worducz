<?php

use app\models\Kategoria;
use app\models\Podkategoria;
use common\components\ArraysPrinter;
use common\components\StringConverter;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Zestaw */

$this->title = 'Nauka słówek';
$podkategoriaNazwa = Podkategoria::findOne($model->podkategoria_id)->nazwa;
$kategoriaId = Podkategoria::findOne($model->podkategoria_id)->kategoria_id;
$kategoriaNazwa = Kategoria::findOne($kategoriaId)->nazwa;
$this->params['breadcrumbs'][] = ['label' => $kategoriaNazwa, 'url' => ['/kategoria/view', 'id' => $kategoriaId]];
$this->params['breadcrumbs'][] = ['label' => $podkategoriaNazwa, 'url' => ['/podkategoria/view', 'id' => $model->podkategoria_id]];
$this->params['breadcrumbs'][] = ['label' => $model->nazwa, 'url' => ['/zestaw/view', 'id' => $model->id]];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-trybNauki">
    <h1 align="center"><?= Html::encode($this->title) ?></h1>

    <br><br>
    <div class="row">

        <div class="media">
            <img src="/uploads/others/one.jpg" class="pull-left"/>
            <div class="media-body"><br>
                <h2>Wybierz sposób nauki</h2>
            </div>
        </div>
        <br>
        <div style="margin-left: 115px;">
            <div class="btn-group">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle btn-lg" id="menu1" type="button"
                            data-toggle="dropdown">
                        Z angielskiego na polski
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">

                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                   href="/zestaw/lang1-lang2?id=<?php echo $model->id ?>&alg=1">
                                Pytaj tylko raz o prawidłową odpowiedź</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                   href="/zestaw/lang1-lang2?id=<?php echo $model->id ?>&alg=2">
                                Pytaj wielokrotnie o prawidłową odpowiedź</a></li>
                    </ul>
                </div>
            </div>

            <div class="separator"></div>

            <div class="btn-group">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle btn-lg" id="menu3" type="button"
                            data-toggle="dropdown">
                        Z polskiego na angielski
                        <span class="caret"></span></button>

                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu3">
                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                   href="/zestaw/lang2-lang1?id=<?php echo $model->id ?>&alg=1">
                                Pytaj tylko raz o prawidłową odpowiedź</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                   href="/zestaw/lang2-lang1?id=<?php echo $model->id ?>&alg=2">
                                Pytaj wielokrotnie o prawidłową odpowiedź</a></li>
                    </ul>
                </div>
            </div>

            <div class="separator"></div>

            <div class="btn-group">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle btn-lg" id="menu2" type="button"
                            data-toggle="dropdown">
                        Wersja
                        mieszana
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu2">
                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                   href="/zestaw/mix?id=<?php echo $model->id ?>&alg=3">
                                Przygotuj do sprawdzianu</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <br><br>
        <div class="media" style="margin-top: 50px">
            <img src="/uploads/others/two.jpg" onClick="hideButton()" class="pull-left" style="cursor: pointer"/>
            <div class="media-body"><br>
                <h2>Pokaż listę wszystkich słówek z danego zestawu</h2>
            </div>

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