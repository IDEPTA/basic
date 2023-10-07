<?php 
namespace app\models;
use yii\db\ActiveRecord;
class payment extends ActiveRecord{
    public function getTenants(){
        return $this->hasOne(Tenants::class, ['account' => 'lodger']);
    }
    public function getServices(){
        return $this->hasOne(Services::class, ['id' => 'service']);
    }
}
?>