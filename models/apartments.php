<?php 
namespace app\models;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
class apartments extends ActiveRecord{
    public function getTenants(){
        return $this->hasOne(Tenants::class, ['id' => 'lodger']);
    }
    public function rules()
    {
        return [
            [['id', 'living', 'area', 'lodger'], 'integer'],
            [['adress'], 'safe'],
        ];
    }
    public function lodgerFullName(){
        return ArrayHelper::map(tenants::find()->all(),'id','Full_name');
    }
}
?>