<?php

namespace app\models;
use yii\base\Model;
use yii\helpers\ArrayHelper;
class paymentForm extends Model{
    public $lodger;
    public $service;
    public $spent;
    public $pay_by;
    public $paid;
    public $date_payment;
    public function rules()
    {
        return[
            [['lodger','service','spent','pay_by','paid'], 'required','message'=>'Это обязательное поле'],
            [['spent'],'number','message' => 'Введите число'],
            [['pay_by','date_payment'],'date','format' => 'yyyy-MM-dd'],
        ];
    }
    public function lodgerFullName(){
        return ArrayHelper::map(tenants::find()->all(),'account','Full_name');
    }
    public function serviceFullName(){
        return ArrayHelper::map(services::find()->all(),'id','type_service');
    }
    public function addPost(){
        $newPost = new payment();
        $newPost->id = '';
        $newPost->lodger = $this->lodger;
        $newPost->service = $this->service;
        $newPost->spent = $this->spent;
        $newPost->pay_by = $this->pay_by;
        $newPost->paid = $this->paid;
        $newPost->date_payment = $this->date_payment;
        $newPost->save();
    }
    public function print($id){
        $req = payment::findOne($id);
        $this->lodger = $req->lodger;
        $this->service = $req->service;
        $this->spent = $req->spent;
        $this->pay_by = $req->pay_by;
        $this->paid = $req->paid;
        $this->date_payment = $req->date_payment;
    }
    public function updatePost($id){
        $updateRow = payment::findOne($id);
        $updateRow->lodger = $this->lodger;
        $updateRow->service = $this->service;
        $updateRow->spent = $this->spent;
        $updateRow->pay_by = $this->pay_by;
        $updateRow->paid = $this->paid;
        $updateRow->date_payment = $this->date_payment;
        $updateRow->save();
    }
    public function addToTrash($typeAction,$id){
        $dataTrash = payment::findOne($id)->toArray();
        $trash = new Trash();
        $trash->id = "";
        $trash->type = $typeAction;
        $trash->tablename = "payment";
        $trash->date = date("Y-m-d H:i:s");
        $trash->data = json_encode($dataTrash, JSON_UNESCAPED_UNICODE);
        $trash->save();
    }
}
?>