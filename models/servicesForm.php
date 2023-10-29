<?php

namespace app\models;
use yii\base\Model;
use yii\helpers\Url;

class servicesForm extends Model{
    public $type_service;
    public $unit;
    public $price;
    public function rules()
    {
        return[
            [['type_service','unit','price'], 'required','message'=>'Это обязательное поле'],
            [['price'],'number','message' => 'Введите число'],
        ];
    }
    public function addPost(){
        $newPost = new services();
        $newPost->id = '';
        $newPost->type_service = $this->type_service;
        $newPost->unit = $this->unit;
        $newPost->price = $this->price;
        $newPost->save();
    }
    public function print($id){
        $req = services::findOne($id);
        $this->type_service = $req->type_service;
        $this->unit = $req->unit;
        $this->price = $req->price;
    }
    public function updatePost($id){
        $updateRow = services::findOne($id);
        $updateRow->type_service = $this->type_service;
        $updateRow->unit = $this->unit;
        $updateRow->price = $this->price;
        $updateRow->save();
    }
}
?>