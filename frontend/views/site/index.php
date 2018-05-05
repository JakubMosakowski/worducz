<?php

use app\models\Kategoria;
use common\components\ImageButtonsDisplayer;

/* @var $this yii\web\View */

$this->title = 'Nauka angielskiego';
$this->params['breadcrumbs'][] ="";

?>
<script>
    window.onload = function () {
        let element=document.getElementById('main-image');
        element.src="/uploads/others/mainImage.jpg";
    };
</script>
<div class="site-index" align="center">

    <div  style="font-size: 150%; color: #9d9d9d">
 Witaj na stronie poświeconej nauce słówek Języka Angielskiego! Jeśli chcesz nauczyć się słownictwa w ekspresowym tempie, znajdujesz się we właściwym miejscu! Wybierz naukę słówek z kategorii która najbardziej Cię interesuje i zacznij naukę już dziś!
        <br><br>
        Życzymy udanej nauki :)<br>
        - Zespół Worducz
        <br><br><br><br>
    </div>
    <?php
    $kategorie=Kategoria::findAll(['ukryte'=>0]);
    $buttonsDisplayer = new ImageButtonsDisplayer();
    $buttonsDisplayer->showButtons($kategorie,'kategoria');
    ?>
    <br>
</div>