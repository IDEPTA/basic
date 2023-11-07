<?php

namespace app\models;
use Yii;
use yii\helpers\ArrayHelper;
use yii\base\Model;
class apartmentsForm extends Model{
    public $id;
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
        return ArrayHelper::map(tenants::find()->all(),'id','Full_name');
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
    public function print($id){
        $req = apartments::findOne($id);
        $this->adress = $req->adress;
        $this->living = $req->living;
        $this->area = $req->area;
        $this->lodger = $req->lodger;
    }
    public function updatePost($id){
        $updateRow = apartments::findOne($id);
        $updateRow->adress = $this->adress;
        $updateRow->living = $this->living;
        $updateRow->area = $this->area;
        $updateRow->lodger = $this->lodger;
        $updateRow->save();
    }
    public function addToTrash($typeAction,$id){
        $dataTrash = apartments::findOne($id)->toArray();
        $trash = new Trash();
        $trash->id = "";
        $trash->type = $typeAction;
        $trash->tablename = "apartments";
        $trash->date = date("Y-m-d H:i:s");
        $trash->data = json_encode($dataTrash, JSON_UNESCAPED_UNICODE);
        $trash->save();
    }
}
?>