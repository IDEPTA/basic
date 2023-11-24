<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\apartments $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Апартаменты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="apartments-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id, 'lodger' => $model->lodger], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id, 'lodger' => $model->lodger], [
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
                'attribute' => 'adress',
                'label' => 'Адрес',
            ],
            [
                'attribute' => 'living',
                'label' => 'Количество проживающих',
            ],
            [
                'attribute' => 'area',
                'label' => 'Площадь',
            ],
            [
                'attribute' => 'tenants.Full_name',
                'label' => 'Жилец',
            ],
        ],
    ]) ?>

</div>
