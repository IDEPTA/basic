<?php

namespace app\models;

use yii\base\Model;

class LabOneFormOne extends Model
{
    //form1
    public $account;
    public $name;
    public $phone;
    public $sex;
    public $date;
    public function rules()
    {
        return[
            //form1
            [['account','name','phone','sex','date'], 'required','message'=>'Это обязательное поле'],
            [['name','sex'],'string','max' => 50],
            [['account'],'number','message'=>'Введите числа'],
            [['date'],'date','format' => 'yyyy-MM-dd'],
        ];
    }
}