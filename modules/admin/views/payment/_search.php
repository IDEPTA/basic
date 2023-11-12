<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\PaymentSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="payment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'lodger') ?>

    <?= $form->field($model, 'service') ?>

    <?= $form->field($model, 'spent') ?>

    <?= $form->field($model, 'pay_by') ?>

    <?php // echo $form->field($model, 'paid') ?>

    <?php // echo $form->field($model, 'date_payment') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>