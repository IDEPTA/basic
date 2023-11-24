<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\payment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="showforms">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'lodger')->label('Жилец')->dropDownList($model->lodgerFullName()) ?>
    <?= $form->field($model, 'service')->label('Услуга')->dropDownList($model->serviceFullName()) ?>
    <?= $form->field($model, 'spent')->label('Израсходовано')->textInput() ?>
    <?= $form->field($model, 'pay_by')->label('Оплатить до')->input('date',['format'=>'yyyy-MM-dd']) ?>
    <?= $form->field($model, 'paid')->label('Оплачено')->dropDownList([
                    'Да' => 'Да',
                    'Нет' => 'Нет',
                ]); ?>
    <?= $form->field($model, 'date_payment')->label('Дата оплаты')->input('date',['format'=>'yyyy-MM-dd']) ?>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
