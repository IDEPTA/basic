<?php 
namespace app\models;
use yii\db\ActiveRecord;
class apartments extends ActiveRecord{
    public function getTenants(){
        return $this->hasOne(Tenants::class, ['id' => 'lodger']);
    }
}
?>