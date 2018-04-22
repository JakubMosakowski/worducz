<?php

namespace common\components;

use Yii;
use yii\db\Exception;
use yii\debug\models\search\Log;

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
                $var = '<a href="index.php?r=kategoria/index/" class="btn btn-link" role="button">
                            <img src=' . $obrazek . ' class="img-rounded" width="150" height="150"/>
                        </a>';
                echo $var;

            }
        }
    }

}

/* @var $searchModel app\models\KategoriaSearch */

