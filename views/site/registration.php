<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class = 'SignUpForm'>
    <h1>Регистрация</h1>
    <?php
    $form = ActiveForm::begin(['id' => 'signup-form']);
    echo $form->field($model,'username')->label('Введите логин');
    echo $form->field($model,'password')->label('Пароль')->passwordInput();
    echo $form->field($model,'password_two')->label('Введите пароль повторно')->passwordInput();
    echo Html::submitButton('Отправить', ['class' => 'btn btn-success']);
    ActiveForm::end();
    echo Yii::$app->session->getFlash('error')
    ?>
    </div>
</body>
</html>