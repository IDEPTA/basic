<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\apartments $model */

$this->title = 'Create Apartments';
$this->params['breadcrumbs'][] = ['label' => 'Apartments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apartments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
