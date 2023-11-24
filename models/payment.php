<?php 
namespace app\models;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
class payment extends ActiveRecord{
    public function getTenants(){
        return $this->hasOne(Tenants::class, ['account' => 'lodger']);
    }
    public function getServices(){
        return $this->hasOne(Services::class, ['id' => 'service']);
    }
    public function rules()
    {
        return [
            [['id', 'lodger', 'service'], 'integer'],
            [['spent'], 'number'],
            [['pay_by', 'paid', 'date_payment'], 'safe'],
        ];
    }
    public function lodgerFullName(){
        return ArrayHelper::map(tenants::find()->all(),'account','Full_name');
    }
    public function serviceFullName(){
        return ArrayHelper::map(services::find()->all(),'id','type_service');
    }
}
?>