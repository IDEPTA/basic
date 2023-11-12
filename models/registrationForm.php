<?php

namespace app\models;
use Yii;
use yii\base\Model;

class registrationForm extends Model
{
    public $username;
    public $password;
    private $_user = false;
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }
    public function SignUp()
    {   
        if($this->getUser() == NULL){
            $newUser = new User();
            $newUser->id = "";
            $newUser->username = $this->username;
            $newUser->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
            $newUser->auth_key = NULL;
            $newUser->save();
            Yii::$app->session->setFlash('success','Регистрация прошла успешно');
        }
        else{
            Yii::$app->session->setFlash('error','Логин занят');
        }
    }
    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()) {
            if (strlen($this->password) < 8) {
                $this->addError($attribute, 'Слишком короткий пароль');
            }
        }
    }
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}