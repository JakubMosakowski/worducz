<?php

namespace common\components;

use Yii;
use yii\db\Exception;

class SqlQueryGenerator
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
}