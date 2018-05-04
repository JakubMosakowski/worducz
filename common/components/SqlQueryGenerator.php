<?php

namespace common\components;

use app\models\Podkategoria;
use app\models\Uprawnienia;
use Yii;
use yii\db\Exception;

class SqlQueryGenerator
{
    private $tablename;

    function __construct($name)
    {
        $this->tablename = $name;
    }

    public static function getUprawnionePodkategorie()
    {
        $uprawnienia = Uprawnienia::find()->where(['konto_id' => Yii::$app->user->identity->getId()])->all();
        $allUprawnienia[] = 0;
        foreach ($uprawnienia as &$upraw) {
            $allUprawnienia[] = $upraw['podkategoria_id'];
        }
        $podkategorie = Podkategoria::find()
            ->where(['in', 'id', $allUprawnienia])->all();

        return $podkategorie;
    }

    public function getSetOfRows()
    {
       // try {
            $rows = Yii::$app->db->createCommand('Select * FROM ' . $this->tablename)->queryAll();
       // } catch (Exception $e) {

       // }
        return $rows;
    }

    public function getSetOfRowsWhere($idNameTable2, $idTable1)
    {
        try {
            $rows = Yii::$app->db->createCommand('Select * FROM ' . $this->tablename . ' WHERE ' . $idNameTable2 . '=' . $idTable1)->queryAll();
        } catch (Exception $e) {

        }
        return $rows;
    }

    public function getZestawPublic($id_podkategoria){
        try {
            $rows = Yii::$app->db->createCommand('Select * FROM  zestaw  WHERE  prywatne=0 AND podkategoria_id='.$id_podkategoria)->queryAll();
        } catch (Exception $e) {

        }
        return $rows;
    }

    public function getZestawMatching($id_konto,$id_podkategoria){
        try {
            $rows = Yii::$app->db->createCommand('Select * FROM  zestaw  WHERE  prywatne=1 AND konto_id='.$id_konto.' AND podkategoria_id='.$id_podkategoria)->queryAll();
        } catch (Exception $e) {

        }
        return $rows;
    }
}