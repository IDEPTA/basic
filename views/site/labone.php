<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$request = Yii::$app -> request;
$get = $request -> get('f',1);
?>

<h2 class = 'lab'>Лабораторная работа №1 
    <a class='links' href="http://basic/web/index.php?r=site%2Flabone&f=1">Жильцы</a>
    <a class='links' href="http://basic/web/index.php?r=site%2Flabone&f=2">Услуги</a></h2>
<?php
if ($get ==1){
    $this->title = 'Лаб. работа №1||Форма №1';
?>
<div class='labOneContainer'>
<?php $form = ActiveForm::begin();  ?>
    <?= $form->field($model1,'account')->label('Номер лицевого договора:') ?>
    <?= $form->field($model1,'name')->label('Вашe имя:') ?> 
    <?= $form->field($model1, 'date')->label('Дата рождения:')->input('date',['format' => 'yyyy-MM-dd'])?>
    <?= $form->field($model1, 'phone')->label('Введите номер телефона')->widget(\yii\widgets\MaskedInput::className(), [
  'mask' => '+7(999)999-99-99',
])->textInput(['placeholder' => $model1->getAttributeLabel('phone')]);?>
    <?= $form->field($model1,'sex')->label('Ваш пол:')->dropDownList([
        'M' => 'Мужской',
        'F' => 'Женский',
    ])?>
    <div>
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>
        <div class='result'>
            <p><b>Номер аккаунта :</b> <?= Html::encode($model1->account)?></p>
            <p><b>Имя :</b> <?= Html::encode($model1->name)?></p>
            <p><b>Дата рождения :</b> <?= Html::encode($model1->date)?></p>
            <p><b>Номер телефона :</b> <?= Html::encode($model1->phone)?></p>
            <p><b>Пол :</b> <?= Html::encode($model1->sex)?></p>
        </div>
</div>
<?}

elseif($get == 2){
    $this->title = 'Лаб. работа №1||Форма №2';
    ?>
<div class='labOneContainer'>
<?php $form = ActiveForm::begin();  ?>
    <?= $form->field($model2,'nameservice')->label('Название:') ?>
    <?= $form->field($model2,'unit')->label('Единица измерения:') ?>
    <?= $form->field($model2, 'price')->label('Цена:')?>
    <div>
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>
        <div class='result'>
            <p><b>Название :</b> <?= Html::encode($model2->nameservice)?></p>
            <p><b>Единица измерения :</b> <?= Html::encode($model2->unit)?></p>
            <p><b>Цена :</b> <?= Html::encode($model2->price)?></p>
        </div>
</div>
<?}?>