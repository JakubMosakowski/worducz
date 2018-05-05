<?php

use app\models\Konto;
use app\models\Podkategoria;
use common\components\ImageButtonsDisplayer;
use common\components\SqlQueryGenerator;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kategoria */

$this->title = $model->nazwa;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategoria-view" align="center">

    <?php
    $podkategorie=Podkategoria::findAll(['kategoria_id'=>$_GET['id']]);
    $buttonsDisplayer = new ImageButtonsDisplayer();
    $buttonsDisplayer->showButtons($podkategorie,'podkategoria');

    ?>

</div>
