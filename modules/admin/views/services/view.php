<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\services $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Таблица услуги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="services-view">

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
                'attribute' => 'type_service',
                'label' => 'Название услуги',
            ],
            [
                'attribute' => 'unit',
                'label' => 'Единица измерения',
            ],
            [
                'attribute' => 'price',
                'label' => 'Цена',
            ],
        ],
    ]) ?>

</div>
