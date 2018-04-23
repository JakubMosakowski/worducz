<?php

use common\components\ImageButtonsDisplayer;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kategoria */

$this->title = $model->nazwa;
$this->params['breadcrumbs'][] = ['label' => 'Kategorie', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategoria-view" align="center">
    <?php
    $buttonsDisplayer = new ImageButtonsDisplayer('podkategoria');
    $rows = $buttonsDisplayer->getSetOfRowsWhere('kategoria_id', $model->id);
    $buttonsDisplayer->showButtons($rows);
    ?>

</div>
