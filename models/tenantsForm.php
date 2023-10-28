<?php

namespace app\models;
use yii\base\Model;
class tenantsForm extends Model{
    public $account;
    public $Full_name;
    public $phone;
    public $birthday;
    public $sex;

    public function rules()
    {
        return[
            [['account','Full_name','phone','birthday','sex'], 'required','message'=>'Это обязательное поле'],
            [['account'],'number','message' => 'Введите число'],
            [['birthday'],'date','format' => 'yyyy-MM-dd'],
        ];
    }
    public function addPost(){
        $newPost = new tenants();
        $newPost->id = '';
        $newPost->account = $this->account;
        $newPost->Full_name = $this->Full_name;
        $newPost->phone = $this->phone;
        $newPost->birthday = $this->birthday;
        $newPost->Sex = $this->sex;
        $newPost->save();
    }
}
?>