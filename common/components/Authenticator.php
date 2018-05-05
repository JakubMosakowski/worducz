<?php

namespace common\components;

use app\models\Konto;
use app\models\Uprawnienia;
use app\models\Zestaw;
use Yii;
use yii\db\Exception;
use yii\helpers\ArrayHelper;

class Authenticator
{

    public static function checkIfRolaMatch($rola_id)
    {
        if (!Yii::$app->user->isGuest) {
            $id = Yii::$app->user->identity->getId();
            $konto = Konto::findOne($id);
            if ($konto !== null){
                if ($konto->rola_id==$rola_id)
                    return true;
                else
                    return false;
            }
            else
                return false;
        }
        return false;
    }

    public static function checkIfHasPermission()
    {
        if (isset($_GET['id'])) {
            return self::checkPermission($_GET['id']);

        }
        return false;
    }

    private static function checkPermission($id_zestaw)
    {
        $zestaw = Zestaw::findOne($id_zestaw);
        $podkategoria_id = $zestaw->podkategoria_id;

        $podkategorie = SqlQueryGenerator::getUprawnionePodkategorie();
        $podkategorie = ArrayHelper::map($podkategorie, 'id', 'nazwa');

        $result = ArrayHelper::keyExists($podkategoria_id, $podkategorie);
        if ($result == false)
            return false;
        else
            return true;
    }

    public static function checkIfAuthor()
    {
        if (isset($_GET['id'])) {
            return self::checkAuthor($_GET['id']);
        }
        return false;
    }


    private static function checkAuthor($zestaw_id)
    {
        $zestaw=Zestaw::findOne($zestaw_id);
        $author_id=$zestaw->konto_id;
        if ($author_id == Yii::$app->user->identity->getId())
            return true;
        else
            return false;
    }

}