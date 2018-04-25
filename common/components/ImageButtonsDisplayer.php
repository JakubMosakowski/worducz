<?php

namespace common\components;

use Yii;
use yii\db\Exception;

class ImageButtonsDisplayer
{
    private $tablename;

    function __construct($name)
    {
        $this->tablename = $name;
    }

    public function getSetOfRowsOfTable()
    {
        try {
            $rows = Yii::$app->db->createCommand('Select * FROM ' . $this->tablename)->queryAll();
        } catch (Exception $e) {

        }
        return $rows;
    }

    public function getSetOfRowsWhere($idNameTable2, $idTable1)
    {
        try {
            $rows = Yii::$app->db->createCommand('Select * FROM ' . $this->tablename . ' WHERE ' . $idNameTable2 . '=' . $idTable1)->queryAll();
        } catch (Exception $e) {

        }
        return $rows;
    }

    public function showButtons($rows)
    {
        foreach ($rows as &$row) {

            $obrazek = $row['obrazek'];
            $nazwa = $row['nazwa'];
            $id = $row['id'];
            $path = "index.php?r=" . $this->tablename . "%2Fview&id=" . $id;
            if (!empty($obrazek)) {
                $var = '<a href=' . $path . ' class="btn btn-link" role="button">
                            <img src=' . $obrazek . ' class="img-rounded" width="150" height="150"/>
                                  <p>' . $nazwa . '</p>
                        </a>';
                echo $var;
            }
        }
    }

    public function showRawButtons($rows)
    {
        foreach ($rows as &$row) {

            $obrazek = 'uploads/others/whiteboard.jpg';
            $nazwa = $row['nazwa'];
            $id = $row['id'];
            $path = "index.php?r=" . $this->tablename . "%2Fview&id=" . $id;
            if (!empty($obrazek)) {
                $var = '<a href=' . $path . ' class="btn btn-link" role="button">
                            <div class="zestawContainer">
                                    <img src=' . $obrazek . ' class="img-rounded" width="200" height="200"/>
                                    <div class="centered">' . $nazwa . '</div>
                            </div>
                        </a>';
                echo $var;

            }
        }
    }

}

/* @var $searchModel app\models\KategoriaSearch */

