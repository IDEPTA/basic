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
    public function addToTrash($typeAction,$id){
        $dataTrash = services::findOne($id)->toArray();
        $trash = new Trash();
        $trash->id = "";
        $trash->type = $typeAction;
        $trash->tablename = "services";
        $trash->date = date("Y-m-d H:i:s");
        $trash->data = json_encode($dataTrash, JSON_UNESCAPED_UNICODE);
        $trash->save();
    }
}
?>