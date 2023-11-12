<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;
$url = Url::to(['registration','table'=>'apartments']);
$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <div>
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Введите логин и пароль</p>
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($model, 'username')->label('Логин')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->label('Пароль')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->label('Запомнить меня')->checkbox([
                'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
            ]) ?>

            <div class="form-group">
                    <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
            <a href=<?echo $url?>>Зарегистрироваться</a>
            <?php ActiveForm::end(); 
            ?>
        </div>
    </div>
</div>
