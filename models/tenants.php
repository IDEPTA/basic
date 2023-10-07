<?php 
namespace app\models;
use yii\db\ActiveRecord;
class tenants extends ActiveRecord{
    public function getApartments(){
        return $this->hasMany(apartments::class, ['id' => 'lodger']);
    }
    public function getPayment(){
        return $this->hasMany(payment::class, ['id' => 'lodger']);
    }
}
?>