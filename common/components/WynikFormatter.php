<?php

namespace common\components;

use Yii;
use yii\db\Exception;

class WynikFormatter
{
    private $id;

    function __construct($id)
    {
        $this->id = $id;
    }
    public function format($rows,$column){
        $array= array();
        foreach ($rows as &$row) {
            if($row['konto_id']==$this->id)
                $array[]=$row[$column];
        }
        return $array;
    }

}
