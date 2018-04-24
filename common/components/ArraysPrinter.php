<?php

namespace common\components;

use Yii;
use yii\db\Exception;

class ArraysPrinter
{
    public static function printTwoDimArray($array)
    {

        if (self::checkIfPrint($array)) {
            echo '</br>';
            echo '<table class="table table-striped table-bordered">';
            echo '<thead >';
            echo '<tr class="bg-primary">';
            echo '<th scope="col">#</th>';
            echo '<th scope="col"></th>';
            echo '<th scope="col"></th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            $i = 0;
            foreach ($array as &$pair) {
                $i++;
                echo '<tr>';
                echo '<td>' . $i . '</td>';
                echo '<td>' . $pair[0] . '</td>';
                echo '<td>' . $pair[1] . '</td>';
                echo '</tr>';
            }
            unset($pair);
            echo '</tbody>';
            echo '</table>';
        }
    }


    private static function checkIfPrint($array)
    {
        $print = true;
        foreach ($array as &$p) {
            if (!array_key_exists(0, $p)) {
                $print = false;
            }
            if (!array_key_exists(1, $p)) {
                $print = false;
            }
        }
        return $print;
    }
}
