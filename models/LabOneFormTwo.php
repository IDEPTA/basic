<?php

namespace app\models;

use yii\base\Model;

class LabOneFormTwo extends Model
{
     //form2
    public $nameservice;
    public $unit;
    public $price;
    public function rules()
    {
        return[
            //form2
            [['nameservice','unit','price'], 'required','message'=>'Это обязательное поле'],
            [['nameservice','unit'],'string'],
            [['price'],'number','message'=>'Введите число'],
        ];
    }
}