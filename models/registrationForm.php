<?php

namespace app\models;

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
            print_r($newUser);
            $newUser->id = "";
            $newUser->username = $this->username;
            $newUser->password = $this->password;
            $newUser->auth_key = "";
            $newUser->save();
        }
    }
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
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