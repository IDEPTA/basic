<?php

use app\models\apartments;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\ApartmentsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Apartments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apartments-index">

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
            'adress:ntext',
            'living',
            'area',
            'lodger',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, apartments $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id, 'lodger' => $model->lodger]);
                 }
            ],
        ],
    ]); ?>


</div>
