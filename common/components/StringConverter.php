<?php

namespace common\components;

class StringConverter
{
    public function convertStringToArray($string){
        $Data = str_getcsv($string, "\n"); //parse the rows
        foreach($Data as &$Row) {
            $Row = str_getcsv($Row, ";");
        } //parse the items in rows
        return $Data;
    }

    public function countWords($string){
        return count($this->convertStringToArray($string));
    }
}