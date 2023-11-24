<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\services $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="showforms">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'type_service')->label('Вид услуги:') ?>
    <?= $form->field($model, 'unit')->label('Единица измерения:') ?>
    <?= $form->field($model, 'price')->label('Цена:') ?>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
