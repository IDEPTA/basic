<?php

namespace app\models;

use yii\base\Model;

class Fourqform extends Model
{
    public $adress;
    public function rules()
    {
        return[
            [['adress'], 'required','message'=>'Это обязательное поле'],
        ];
    }
    public function getQuery(){
        $query = apartments::find()->where("adress like '%{$this->adress}%'")->with('tenants')->all();
        return $query;
    }
}