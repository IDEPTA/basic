<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\apartments $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="showforms">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'adress')->label('Адрес') ?>
    <?= $form->field($model, 'living')->label('Количество проживающих')->textInput() ?>
    <?= $form->field($model, 'area')->label('Площадь')->textInput() ?>
    <?= $form->field($model, 'lodger')->label('Владелец')->dropDownList($model->lodgerFullName());?>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
