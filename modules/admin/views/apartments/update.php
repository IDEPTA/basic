<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\apartments $model */

$this->title = 'Update Apartments: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Apartments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'lodger' => $model->lodger]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="apartments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
