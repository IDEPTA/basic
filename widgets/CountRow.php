<?php
namespace app\widgets;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use app\models\services;
use app\models\tenants;
use app\models\apartments;
use app\models\payment;

class CountRow extends Widget{
    public $table;
    public $count;
    public function init(){
        parent::init();
        switch($this->table){
            case "apartments":
                $this->count=apartments::find()->count();
                break;
            case "tenants":
                $this->count=tenants::find()->count();
                break;
            case "services":
                $this->count=services::find()->count();
                break;
            case "payment":
                $this->count=payment::find()->count();
                break;
        }
    }
    public function run(){
        echo '<p> Количество записей: '.$this->count.'</p>';
    }
}
?>