<?php

namespace app\models;

use yii\base\Model;

class OneqForm extends Model
{
    public $area_one;
    public $area_two;
    public function rules()
    {
        return[
            [['area_one','area_two'], 'required','message'=>'Это обязательное поле'],
            [['area_one','area_two'], 'number','message'=>'Введите число'],
        ];
    }
    public function getQuery(){
        $query = apartments::find()
        ->with('tenants')
        ->where(['between','area',$this->area_one,$this->area_two])
        ->all();
        return $query;
    }
}