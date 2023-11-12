<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\tenants $model */

$this->title = 'Create Tenants';
$this->params['breadcrumbs'][] = ['label' => 'Tenants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tenants-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
