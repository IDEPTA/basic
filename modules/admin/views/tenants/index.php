<?php

use app\models\tenants;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\tenantsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Таблица жильцы';
$this->params['breadcrumbs'][] = ['label' => 'Админка', 'url' => ['../admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tenants-index">

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
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, tenants $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
