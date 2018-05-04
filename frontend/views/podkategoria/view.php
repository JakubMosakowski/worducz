<?php

use app\models\Kategoria;
use common\components\ImageButtonsDisplayer;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Podkategoria */

$this->title = $model->nazwa;
$kategoriaNazwa=Kategoria::findOne($model->kategoria_id)->nazwa;
$this->params['breadcrumbs'][] = ['label' => $kategoriaNazwa, 'url' => ['/kategoria/view', 'id' => $model->kategoria_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="podkategoria-view" align="center">

    <?php
    $buttonsDisplayer = new ImageButtonsDisplayer('zestaw');
    $sqlGen=new \common\components\SqlQueryGenerator('zestaw');

    $rows1=$sqlGen->getZestawPublic($model->id);
    $buttonsDisplayer->showRawButtons($rows1);

    if(!Yii::$app->user->isGuest){
        $rows2=$sqlGen->getZestawMatching(Yii::$app->user->identity->getId(),$model->id);
        $buttonsDisplayer->showRawButtons($rows2);
    }
    ?>

</div>
