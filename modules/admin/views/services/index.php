<?php

use app\models\services;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\ServicesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Таблица услуги';
$this->params['breadcrumbs'][] = ['label' => 'Админка', 'url' => ['../admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

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
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, services $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
