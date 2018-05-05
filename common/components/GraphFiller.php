<?php

namespace common\components;

use app\models\Podkategoria;
use app\models\Wynik;
use app\models\Zestaw;
use Yii;
use yii\db\Exception;

class GraphFiller
{
    public $resultArray=Array();
    public $scoresAsIntegers=Array();

    public function __construct($id){

        $wyniki=Wynik::findAll(['konto_id'=>$id]);
        foreach($wyniki as $item){
            $zestawId=$item->zestaw_id;
            $zestaw=Zestaw::findOne($zestawId);

            $datesArray[]=$item->data_wyniku;
            $scoresArray[]=$item->wynik;
            $zestawNameArray[]=$zestaw->nazwa;



            $podkategoriaId=$zestaw->podkategoria_id;
            $podkategoriaArrayName[]=Podkategoria::findOne($podkategoriaId)->nazwa;
        }
        $this->scoresAsIntegers = array_map('intval', $scoresArray);
        $count = count($datesArray);

        for ($i = 0; $i < $count; $i++) {
            $this->resultArray[] = $datesArray[$i] . '/' . $zestawNameArray[$i].'<br>'.$podkategoriaArrayName[$i];
        }
    }
}