<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\payment $model */

$this->title = 'Обновление записи: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Таблица оплата', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Оплата';
?>
<div class="payment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
