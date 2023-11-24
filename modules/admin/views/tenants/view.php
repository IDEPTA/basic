<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\tenants $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Таблица жильцы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tenants-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить эту запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'id',
            [
                'attribute' => 'account',
                'label' => 'Номер учетной записи',
            ],
            [
                'attribute' => 'Full_name',
                'label' => 'Ф.И.О',
            ],
            [
                'attribute' => 'phone',
                'label' => 'Телефон',
            ],
            [
                'attribute' => 'Sex',
                'label' => 'Пол',
            ],
        ],
    ]) ?>

</div>
