<?php
use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;


$urlServices = Url::to(['./services/index']);
$urlApartments = Url::to(['./apartments/index']);
$urlPayment = Url::to(['./payment/index']);
$urlTenants = Url::to(['./tenants/index']);

?>
    <nav class="navbarLab2">
        <?php
        echo Html::a('Таблица Апартаменты', $urlApartments);
        echo Html::a('Таблица Услуги', $urlServices);
        echo Html::a('Таблица Жильцы', $urlTenants);
        echo Html::a('Таблица Оплата', $urlPayment);
        ?>
    </nav>
    <div>
        <h2>Добро пожаловать!</h2>
        <?php
            echo '<h3>Ваш логин - '.Yii::$app->user->identity->username.'</h3>';
            
        ?>
    </div>
</body>
</html>