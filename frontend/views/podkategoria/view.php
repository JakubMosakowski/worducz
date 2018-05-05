<?php

use app\models\Kategoria;
use app\models\Zestaw;
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
    $zestawy=Zestaw::findAll(['prywatne'=>0, 'podkategoria_id'=>$_GET['id']]);
    $buttonsDisplayer = new ImageButtonsDisplayer();
    $buttonsDisplayer->showRawButtons($zestawy,'zestaw');
    if(!Yii::$app->user->isGuest){
        $zestawy=Zestaw::findAll(['prywatne'=>1, 'konto_id'=>Yii::$app->user->identity->getId(), 'podkategoria_id'=>$_GET['id']]);
        $buttonsDisplayer->showRawButtons($zestawy,'zestaw');
    }
    ?>

</div>
