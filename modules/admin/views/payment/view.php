<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\payment $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Таблица оплата', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="payment-view">


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
                'attribute' => 'tenants.Full_name',
                'label' => 'Жилец',
            ],
            [
                'attribute' => 'services.type_service',
                'label' => 'Услуга',
            ],
            [
                'attribute' => 'spent',
                'label' => 'Израсходованно',
            ],
            [
                'attribute' => 'pay_by',
                'label' => 'Оплатить до',
            ],
            [
                'attribute' => 'paid',
                'label' => 'Оплачено',
            ],
            [
                'attribute' => 'date_payment',
                'label' => 'Дата оплаты',
            ],
        ],
    ]) ?>

</div>
