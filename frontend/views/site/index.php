<?php

use common\components\ImageButtonsDisplayer;

/* @var $this yii\web\View */

$this->title = 'Nauka angielskiego';
?>
<div class="site-index" align="center">
    <?php
    $buttonsDisplayer = new ImageButtonsDisplayer('kategoria');
    $rows = $buttonsDisplayer->getSetOfRowsOfTable();
    $buttonsDisplayer->showButtons($rows);
    ?>

</div>