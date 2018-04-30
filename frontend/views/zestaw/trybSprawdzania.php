<?php

use common\components\StringConverter;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Zestaw */

$this->title = 'Tryb sprawdzania';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-trybNauki" align="center">
    <h1 align="center"><?= Html::encode($this->title) ?></h1>
    <br><br>
    <a href="index.php?r=zestaw%2Flang1-lang2&id=<?php echo $model->id ?>&alg=1" class="btn btn-primary" role="button"
       style="margin-right: 15px">Angielski => Polski</a>
    <a href="index.php?r=zestaw%2Fmix&id=<?php echo $model->id ?>&alg=3" class="btn btn-primary" role="button"
       style="margin-right: 15px">Mieszane</a>
    <a href="index.php?r=zestaw%2Flang2-lang1&id=<?php echo $model->id ?>&alg=1" class="btn btn-primary" role="button"
       style="margin-right: 15px">Polski => Angielski</a>

</div>