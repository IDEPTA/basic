<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\services $model */

$this->title = 'Обновление записи: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Таблица услуги', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="services-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
