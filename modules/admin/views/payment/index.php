<?php

use app\models\payment;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\PaymentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Таблица оплата';
$this->params['breadcrumbs'][] = ['label' => 'Админка', 'url' => ['../admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                'attribute' => 'lodger',
                'value' => function ($model) {
                return $model->tenants->Full_name;
                },
                'label'=>'Жилец',
            ],
            [
                'attribute' => 'service',
                'value' => function ($model) {
                return $model->services->type_service;
                },
                'label'=>'Услуга',
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
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, payment $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
