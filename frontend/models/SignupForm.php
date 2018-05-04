<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $imie;
    public $nazwisko;
    public $rola_id;
    public $email;
    public $password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['imie', 'default'],
            ['nazwisko', 'default'],

            ['rola_id', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Ta nazwa użytkownika jest już zajęta.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            [['username'], 'match', 'pattern' => '/^[AaĄąBbCcĆćDdEeĘęFfGgHhIiJjKkLlŁłMmNnŃńOoÓóPpRrSsŚśTtUuWwYyZzŹźŻż1234567890]*$/', 'message'=>'Możesz podać tylko litery lub cyfry!!'],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Ten email jest już zajęty.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Nazwa użytkownika',
            'password' => 'Hasło',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        if(!empty($this->imie))
            $user->imie=$this->imie;
        if(!empty($this->nazwisko))
            $user->nazwisko=$this->nazwisko;
        $user->rola_id=$this->rola_id;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
