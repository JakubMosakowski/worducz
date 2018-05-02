<?php

namespace common\components;

use Yii;
use yii\db\Exception;

class HiddenRemoval
{
    public static function removeHidden(){
        echo '<script>document.getElementsByClassName("btn").item(1).classList.remove("hidden")</script>';
    }
}