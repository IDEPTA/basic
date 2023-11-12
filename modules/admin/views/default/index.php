<?php
use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
NavBar::begin([]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav'],
    'items' => [
        ['label' => 'Услуги', 'url' => ['./services/index']],
        ['label' => 'Апартаменты', 'url' => ['./apartments/index']],
        ['label' => 'Оплата', 'url' => ['./payment/index']],
        ['label' => 'Жильцы', 'url' => ['./tenants/index']],
        ['label' => 'Услуги', 'url' => ['/admin/views/services/index.php']],
    ],
]);
NavBar::end();
?>
    <div>
        <h2>Добро пожаловать!</h2>
        <?php
            echo '<h3>Ваш логин - '.Yii::$app->user->identity->username.'</h3>';
            
        ?>
    </div>
</body>
</html>