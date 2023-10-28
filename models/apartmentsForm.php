<?php

namespace app\models;
use yii\base\Model;
class apartmentsForm extends Model{
    public $adress;
    public $living;
    public $area;
    public $lodger;
    public function rules()
    {
        return[
            [['adress','living','area','lodger'], 'required','message'=>'Это обязательное поле'],
            [['living','area','lodger'],'number','message' => 'Введите число'],
        ];
    }
    public function lodgerFullName(){
        $query = apartments::find()
        ->select('lodger')
        ->with('tenants')
        ->asArray()
        ->all();
        return $query;
    }
    public function addPost(){
        $newPost = new apartments();
        $newPost->id = '';
        $newPost->adress = $this->adress;
        $newPost->living = $this->living;
        $newPost->area = $this->area;
        $newPost->lodger = $this->lodger;
        $newPost->save();
    }
}
?>