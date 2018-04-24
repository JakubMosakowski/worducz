<?php

use common\components\ImageButtonsDisplayer;


/* @var $this yii\web\View */
/* @var $model app\models\Podkategoria */

$this->title = $model->nazwa;
$this->params['breadcrumbs'][] = ['label' => 'Podkategorie', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="podkategoria-view" align="center">

    <?php
    $buttonsDisplayer = new ImageButtonsDisplayer('zestaw');
    $rows = $buttonsDisplayer->getSetOfRowsWhere('podkategoria_id', $model->id);
    $buttonsDisplayer->showRawButtons($rows);
    ?>

</div>
