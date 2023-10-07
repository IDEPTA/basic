<?php

namespace app\models;

use yii\base\Model;

class Threeqform extends Model
{
    public $adress;
    public function rules()
    {
        return[
            [['adress'], 'required','message'=>'Это обязательное поле'],
        ];
    }
    public function getQuery(){
        $query = payment::find()->select(['tenants.Full_name','apartments.adress','Month(date_payment) as month','payment.spent'])
        ->innerJoin('tenants','payment.lodger = tenants.account')
        ->innerJoin('apartments','apartments.lodger = tenants.id')
        ->where("payment.service = 5")
        ->andWhere("apartments.adress LIKE '%{$this->adress}%'")
        ->asArray()
        ->all();
        return $query;
    }
}