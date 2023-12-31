<?php

namespace app\controllers;

use Yii;

use yii\web\Controller;
use yii\helpers\Url;

use app\models\services;
use app\models\tenants;
use app\models\apartments;
use app\models\payment;

use app\models\apartmentsForm;
use app\models\servicesForm;
use app\models\tenantsForm;
class CrudController extends Controller{
    public function actionCreate(){
        $getTable = Yii:: $app ->request->get('table');  
        switch($getTable){
            case "services":
                $addForm = new servicesForm;
                break;
            case "tenants":
                $addForm = new tenantsForm;
                break;
            case "apartments":
                $addForm = new apartmentsForm;
                break;
        }
        if($addForm->load(Yii::$app->request->post()) && $addForm->validate()){
            $addForm->addPost();
            return $this->redirect(Url::to(['crud/read','table' => $getTable]));
        };
        return $this->render("@app/views/site/createform",['addForm' => $addForm]);
    }
    public function actionRead(){
        $getTable = Yii:: $app ->request->get('table');  
        echo $getTable;
        $services = services::find()->all();
        $payment = payment::find()->with('tenants')->with('services')->all();
        $tenants = tenants::find()->all();
        $apartments = apartments::find()->with('tenants')->all();
        return $this->render('@app/views/site/labthree',
                    ['services' => $services,
                    'payment' => $payment,
                    'tenants' => $tenants,
                    'apartments' => $apartments,
                ]);
    }
    public function actionUpdate(){
        $getTable = Yii:: $app ->request->get('table');  
        switch($getTable){
            case "services":
                $updateForm = new servicesForm;
                break;
            case "tenants":
                $updateForm = new tenantsForm;
                break;
            case "apartments":
                $updateForm = new apartmentsForm;
                break;
        }
        if($updateForm->load(Yii::$app->request->post()) && $updateForm->validate()){
            return $this->redirect(Url::to(['crud/read','table' => $getTable]));
        };
        return $this->render("@app/views/site/createform",['addForm' => $updateForm]);
        
    }
    public function actionDelate(){
        $getId = Yii:: $app ->request->get('id');
        $getTable = Yii:: $app ->request->get('table');
        switch($getTable){
            case "services":
                $result = services::findOne($getId);
                break;
            case "payment":
                $result = payment::findOne($getId);
                break;
            case "tenants":
                $result = tenants::findOne($getId);
                break;
            case "apartments":
                $result = apartments::findOne($getId);
                break;
        }
        $result->delete();        
        return $this->redirect(Url::to(['crud/read','table' => $getTable]));
    }
}
?>