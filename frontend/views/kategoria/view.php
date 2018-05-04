<?php

use app\models\Konto;
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
    $buttonsDisplayer = new ImageButtonsDisplayer('podkategoria');
    $sqlGen = new \common\components\SqlQueryGenerator('podkategoria');
    $rows = $sqlGen->getSetOfRowsWhere('kategoria_id', $model->id);
    $buttonsDisplayer->showButtons($rows);
    ?>

</div>
