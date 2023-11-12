<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\tenants $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tenants-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'account')->textInput() ?>

    <?= $form->field($model, 'Full_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'Sex')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
