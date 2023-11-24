<?php

namespace app\models;
use Yii;
use yii\base\Model;

class registrationForm extends Model
{
    public $username;
    public $password;
    public $password_two;
    private $_user = false;
    public function rules()
    {
        return [
            [['username', 'password','password_two'], 'required'],
            ['password', 'validatePassword'],
            [['password'],'passwordComparsion'],

            
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
        if (!$this->hasErrors() ) {
            if (strlen($this->password) < 8) {
                $this->addError($attribute, 'Слишком короткий пароль');
            }
        }
    }
    public function passwordComparsion($attribute){
        if($this->password != $this->password_two){
                $this->addError($attribute, 'Пароли не совпадают');
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