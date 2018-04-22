<?php
use common\components\ImageButtonsDisplayer;
/* @var $this yii\web\View */

$this->title = 'Nauka angielskiego';
?>
<div class="site-index" align="center">
    <?php
        $buttonsDisplayer = new ImageButtonsDisplayer();
        $rows = $buttonsDisplayer->getSetOfRows('kategoria');
        $buttonsDisplayer->showButtons($rows);

    ?>

</div>