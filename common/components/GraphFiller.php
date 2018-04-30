<?php

namespace common\components;

use Yii;
use yii\db\Exception;

class GraphFiller
{
    public $resultArray=Array();
    public $scoresAsIntegers=Array();

    public function __construct($id){
        $sqlGen = new SqlQueryGenerator('wynik');
        $formatter = new WynikFormatter($id);
        $rows = $sqlGen->getSetOfRows();
        $datesArray = $formatter->format($rows, 'data_wyniku');
        $scoresArray = $formatter->format($rows, 'wynik');
        $zestawArray = $formatter->format($rows, 'zestaw_id');
        $this->scoresAsIntegers = array_map('intval', $scoresArray);
        $count = count($datesArray);

        for ($i = 0; $i < $count; $i++) {
            $zestawName = Yii::$app->db->createCommand('Select nazwa FROM zestaw WHERE id =' . $zestawArray[$i])->queryScalar();
            $this->resultArray[] = $datesArray[$i] . '/' . $zestawName;
        }
    }
}