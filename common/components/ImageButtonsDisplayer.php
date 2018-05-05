<?php

namespace common\components;

use Yii;
use yii\db\Exception;

class ImageButtonsDisplayer
{
    public function showButtons($models,$class_name)
    {
        try {
            foreach ($models as &$row) {
                $obrazek = $row->obrazek;
                $nazwa = $row->nazwa;
                $id = $row->id;
                $path = $class_name. "/view?id=" . $id;
                if (!empty($obrazek)) {
                    $var = '<a href=/' . $path . ' class="btn btn-link" role="button" style="color: #9d9d9d">
                            <img src=/' . $obrazek . ' class="img-rounded" width="170" height="170"/>
                                  <p style="margin: 10px 0; font-size: 130%;">' . $nazwa . '</p>
                        </a>';
                    echo $var;
                }
            }
        } catch (\Exception $e) {
        }

    }

    public function showRawButtons($models,$class_name)
    {
        try {
            foreach ($models as &$row) {

                $obrazek = 'uploads/others/whiteboard.jpg';
                $nazwa = $row->nazwa;
                $id = $row->id;
                $path = $class_name . "/view?id=" . $id;
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

        } catch (\Exception $e) {
        }
    }

}

/* @var $searchModel app\models\KategoriaSearch */

