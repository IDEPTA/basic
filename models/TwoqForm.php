<?php

namespace app\models;

use yii\base\Model;

class Twoqform extends Model
{
    public $adress;
    public function rules()
    {
        return[
            [['adress'], 'required','message'=>'Это обязательное поле'],
        ];
    }
    public function getQuery(){
        $query = apartments::find()
        ->where([
            'living' => Apartments::find()
                ->select(['MAX(living)'])
                ->where(['like', 'adress', "%{$this->adress}%", false])
        ])
        ->andWhere(['like', 'adress', "%{$this->adress}%", false])
        ->all();
        return $query;
    }
}