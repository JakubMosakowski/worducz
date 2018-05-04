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


    public function showButtons($rows)
    {
        foreach ($rows as &$row) {

            $obrazek = $row['obrazek'];
            $nazwa = $row['nazwa'];
            $id = $row['id'];
            $path = $this->tablename . "/view?id=" . $id;
            if (!empty($obrazek)) {
                $var = '<a href=/' . $path . ' class="btn btn-link" role="button" style="color: #9d9d9d">
                            <img src=/' . $obrazek . ' class="img-rounded" width="170" height="170"/>
                                  <p style="margin: 10px 0; font-size: 130%;">' . $nazwa . '</p>
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
            $path = $this->tablename . "/view?id=" . $id;
            if (!empty($obrazek)) {
                $var = '<a href=/' . $path . ' class="btn btn-link" role="button">
                            <div class="zestawContainer">
                                    <img src=/' . $obrazek . ' class="img-rounded" width="200" height="200"/>
                                    <p class="centered">' . $nazwa . '</p>
                            </div>
                        </a>';
                echo $var;

            }
        }
    }

}

/* @var $searchModel app\models\KategoriaSearch */

