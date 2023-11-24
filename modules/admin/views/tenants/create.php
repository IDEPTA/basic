<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\tenants $model */

$this->title = 'Создание записи';
$this->params['breadcrumbs'][] = ['label' => 'Таблица жильцы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tenants-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
