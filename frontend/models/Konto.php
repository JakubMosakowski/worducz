<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "konto".
 *
 * @property int $id
 * @property int $rola_id
 * @property string $imie
 * @property string $nazwisko
 * @property string $email
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Rola $rola
 * @property Uprawnienia[] $uprawnienias
 * @property Podkategoria[] $podkategorias
 * @property Wynik[] $wyniks
 * @property Zestaw[] $zestaws
 */
class Konto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'konto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rola_id', 'imie', 'nazwisko', 'email', 'username', 'auth_key', 'password_hash', 'password_reset_token', 'status', 'created_at', 'updated_at'], 'required'],
            [['rola_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['imie'], 'string', 'max' => 20],
            [['nazwisko'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 100],
            [['username', 'auth_key', 'password_hash', 'password_reset_token'], 'string', 'max' => 250],
            [['rola_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rola::className(), 'targetAttribute' => ['rola_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rola_id' => 'Rola ID',
            'imie' => 'Imie',
            'nazwisko' => 'Nazwisko',
            'email' => 'Email',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRola()
    {
        return $this->hasOne(Rola::className(), ['id' => 'rola_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUprawnienias()
    {
        return $this->hasMany(Uprawnienia::className(), ['konto_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPodkategorias()
    {
        return $this->hasMany(Podkategoria::className(), ['id' => 'podkategoria_id'])->viaTable('uprawnienia', ['konto_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWyniks()
    {
        return $this->hasMany(Wynik::className(), ['konto_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZestaws()
    {
        return $this->hasMany(Zestaw::className(), ['konto_id' => 'id']);
    }
}
