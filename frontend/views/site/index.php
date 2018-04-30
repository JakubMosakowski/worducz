<?php

use common\components\ImageButtonsDisplayer;

/* @var $this yii\web\View */

$this->title = 'Nauka angielskiego';
?>
<div class="site-index" align="center">
    <?php
    $buttonsDisplayer = new ImageButtonsDisplayer('kategoria');
    $sqlGen=new \common\components\SqlQueryGenerator('kategoria');
    $rows = $sqlGen->getSetOfRows();
    $buttonsDisplayer->showButtons($rows);
    ?>

</div>