<?php

namespace app\models;

use yii\base\Model;

class LabOneForm extends Model
{
    public $account;
    public $name;
    public $date;
    public $phone;
    public $sex;
    public function rules()
    {
        return[
            [['account','name','date','phone','sex'], 'required','message'=>'Это обязательное поле'],
            [['name','sex'],'string','max' => 50],
            [['date'],'date','format' => 'dd.MM.yyyy'],
            [['account','phone'],'number','message'=>'Введите числа'],
        ];
    }
}