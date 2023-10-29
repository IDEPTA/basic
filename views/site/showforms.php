<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<div class='showforms'>
<?php
        if($id>0){
            $model->print($id);
        }
        $getTable = Yii::$app ->request->get('table');
        $form = ActiveForm::begin();
        switch($getTable){
            case "services":
                echo $form->field($model,'type_service')->label('Название услуги:');
                echo $form->field($model,'unit')->label('Единица измерения:');
                echo $form->field($model,'price')->label('Цена, руб:');
               
                break;
            case "payment":
                echo $form->field($model,'lodger')->label('Жилец:')->dropDownList($model->lodgerFullName());
                echo $form->field($model,'service')->label('Услуга:')->dropDownList($model->serviceFullName());
                echo $form->field($model,'spent')->label('Израсходованно:');
                echo $form->field($model,'pay_by')->label('Оплатить до: ')->input('date',['format'=>'yyyy-MM-dd']);
                echo $form->field($model,'paid')->label('Оплачено: ')->dropDownList([
                    'Да' => 'Да',
                    'Нет' => 'Нет',
                ]);
                echo $form->field($model,'date_payment')->label('Дата оплаты: ')->input('date',['format'=>'yyyy-MM-dd']);
                
                break;
            case "tenants":
                echo $form->field($model,'account')->label('Номер лицевого договора:');
                echo $form->field($model,'Full_name')->label('Вашe имя:');
                echo $form->field($model, 'birthday')->label('Дата рождения:')->input('date',['format' => 'yyyy-MM-dd']);
                echo $form->field($model, 'phone')->label('Введите номер телефона')->widget(\yii\widgets\MaskedInput::className(), [
              'mask' => '89999999999',
            ])->textInput(['placeholder' => $model->getAttributeLabel('номер телефона')]);
                echo $form->field($model,'sex')->label('Ваш пол:')->dropDownList([
                    'M' => 'Мужской',
                    'F' => 'Женский',
                ]);
                
                break;
            case "apartments":
                echo $form->field($model,'adress')->label('Адрес проживания:')->input('value',['adsa']);
                echo $form->field($model,'living')->label('Количество жильцов, чел. :');
                echo $form->field($model,'area')->label('Площадь, м<sup>3</sup>:');
                echo $form->field($model,'lodger')->label('Жилец:')->dropDownList($model->lodgerFullName());
                break;
        }
        echo Html::submitButton('Отправить', ['class' => 'btn btn-success']);
        ActiveForm::end();
?>
</div>