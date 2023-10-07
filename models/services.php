<?php 
namespace app\models;
use yii\db\ActiveRecord;
class services extends ActiveRecord{
    public function getPayment(){
        return $this->hasMany(payment::class, ['service' => 'id']);
    }
}
?>