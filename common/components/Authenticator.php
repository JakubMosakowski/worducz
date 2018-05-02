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

    public static function checkIfRola($rola_id)
    {
        if (!Yii::$app->user->isGuest) {
            $id = Yii::$app->user->identity->getId();
            $konto = Konto::findOne($id);
            if ($konto !== null)
                return $konto->rola_id == $rola_id;
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

    public static function checkIfHasPermissionWithId($id)
    {
        return self::checkPermission($id);
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

    public static function checkIfAuthorWithId($id)
    {
        $zestaw = Zestaw::findOne($id);
        $author_id = $zestaw->konto_id;
        return self::checkAuthor($author_id);
    }

    private static function checkAuthor($id)
    {
        if ($id == Yii::$app->user->identity->getId())
            return true;
        else
            return false;
    }

}