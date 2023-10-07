<?php

namespace app\models;

use yii\base\Model;

class Fiveqform extends Model
{
    public $month;
    public function rules()
    {
        return[
            [['month'], 'required','message'=>'Это обязательное поле'],
            [['month'], 'number'],
        ];
    }
    public function getQuery(){
        $query = payment::find()->with('tenants')->with('services')->where('DAY(date_payment)>15')->andWhere("MONTH(date_payment)=$this->month")->all();
        return $query;
    }
}