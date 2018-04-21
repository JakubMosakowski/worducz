<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kategoria".
 *
 * @property int $id
 * @property string $nazwa
 * @property string $opis
 * @property resource $obrazek
 *
 * @property Podkategoria[] $podkategorias
 */
class Kategoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kategoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nazwa', 'opis'], 'required'],
            [['opis'], 'string'],
            [['obrazek'], 'file','extensions'=>'jpeg,jpg,png,gif'],
            [['nazwa'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nazwa' => 'Nazwa',
            'opis' => 'Opis',
            'obrazek' => 'Obrazek',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPodkategorias()
    {
        return $this->hasMany(Podkategoria::className(), ['kategoria_id' => 'id']);
    }
}
