<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\tenants $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="showforms">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'account')->label('Аккаунт') ?>
    <?= $form->field($model, 'Full_name')->label('Ф.И.О') ?>
    <?= $form->field($model, 'phone')->label('Номер телефона')->widget(\yii\widgets\MaskedInput::className(), [
              'mask' => '89999999999',
            ])->textInput(['placeholder' => $model->getAttributeLabel('Номер телефона')]); ?>
    <?= $form->field($model, 'Sex')->label('Пол')->dropDownList([
                    'M' => 'Мужской',
                    'F' => 'Женский',
                ]);?>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
