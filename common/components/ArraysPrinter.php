<?php

namespace common\components;

use Yii;
use yii\db\Exception;

class ArraysPrinter
{
    public static function printTwoDimArray($array)
    {
        echo '<table class="table">';
            echo '<thead>';
                echo '<tr>';
                    echo '<th scope="col">#</th>';
                    echo '<th scope="col"> </th>';
                    echo '<th scope="col"> </th>';
                echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
                echo 'th scope="row">1</th>';
                foreach ($array as &$pair) {
                    echo '<td>'.$pair[0].'</td>';
                }


        unset($pair);
    }
}
