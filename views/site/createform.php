<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php
        $getTable = Yii:: $app ->request->get('table');
        $form = ActiveForm::begin();
        switch($getTable){
            case "services":
                echo $form->field($addForm,'type_service')->label('Название услуги:');
                echo $form->field($addForm,'unit')->label('Единица измерения:');
                echo $form->field($addForm,'price')->label('Цена:');
                echo Html::submitButton('Отправить', ['class' => 'btn btn-success']);
                break;
            case "payment":
                echo $form->field($addForm,'adress')->label('Номер лицевого договора:');
                echo Html::submitButton('Отправить', ['class' => 'btn btn-success']);
                break;
            case "tenants":
                echo $form->field($addForm,'account')->label('Номер лицевого договора:');
                echo $form->field($addForm,'Full_name')->label('Вашe имя:');
                echo $form->field($addForm, 'birthday')->label('Дата рождения:')->input('date',['format' => 'yyyy-MM-dd']);
                echo $form->field($addForm, 'phone')->label('Введите номер телефона')->widget(\yii\widgets\MaskedInput::className(), [
              'mask' => '+7(999)999-99-99',
            ])->textInput(['placeholder' => $addForm->getAttributeLabel('номер телефона')]);
                echo $form->field($addForm,'sex')->label('Ваш пол:')->dropDownList([
                    'M' => 'Мужской',
                    'F' => 'Женский',
                ]);
                break;
            case "apartments":
                $request = $addForm->lodgerFullName();
                $fullNames = [];
                foreach($request as $value){
                        $fullNames[$value['lodger']] = $value['tenants']['Full_name'];
                }

                echo $form->field($addForm,'adress')->label('Адрес проживания:');
                echo $form->field($addForm,'living')->label('Количество жильцов:');
                echo $form->field($addForm,'area')->label('Площадь:');
                echo $form->field($addForm,'lodger')->label('Жилец:')->dropDownList($fullNames);
                echo Html::submitButton('Отправить', ['class' => 'btn btn-success']);
                break;
        }
        ActiveForm::end();
?>