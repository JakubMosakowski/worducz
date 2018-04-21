<?php

namespace common\components;

use Yii;
use yii\db\Exception;

class ImageButtonsDisplayer {

    public function getSetOfRows($tablename) {
        try {
            $rows = Yii::$app->db->createCommand('Select * FROM ' . $tablename)->queryAll();
        } catch (Exception $e) {
        }
        return $rows;
    }

    public function showButtons($rows) {
        foreach ($rows as &$row) {

            $obrazek = $row['obrazek'];
            $nazwa = $row['nazwa'];

            if (!empty($obrazek)) {
                // echo $obrazek;
                //echo $nazwa;
                // Html::button('Press me!', ['class' => 'teaser']) ;
                /* $var = "<?= Html::a(Html::img(".$obrazek.", ['alt' => ".$nazwa."]),
                  ['kategoria/index'],
                  ['class' =>'btn btn-success']);?>"; */
                $var = "<a href=\"index.php?r=kategoria/index/\" class=\"btn btn-success\" role=\"button\">
                            <img src=" . $obrazek . " width=\"150\" height=\"150\"/>
                        </a>";
                echo $var;
                /* Html::a(Html::img('@web/uploads/kategorie/Inne1516.jpg', ['alt' => 'sad']),
                  ['kategoria/index'],
                  ['class' =>'btn btn-success']); */
            }
        }
    }

}

/* @var $this yii\web\View */
/* @var $searchModel app\models\KategoriaSearch */

