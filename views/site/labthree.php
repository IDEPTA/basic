<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\widgets\CountRow;
$this->title = 'Лабораторная работа №3';
$this->params['breadcrumbs'][] = $this->title;
$urlApartments = Url::to(['crud/read','table'=>'apartments']);
$urlServices = Url::to(['crud/read','table'=>'services']);
$urlTenants = Url::to(['crud/read','table'=>'tenants']);
$urlPayment = Url::to(['crud/read','table'=>'payment']);
$get = Yii::$app ->request->get('table');
?>
<div class='crud-container'>
    <h2 class = 'lab'>Лабораторная работа №3</h2>
    <nav class="navbarLab2">
        <?php
        echo Html::a('Таблица Апартаменты', $urlApartments);
        echo Html::a('Таблица Услуги', $urlServices);
        echo Html::a('Таблица Жильцы', $urlTenants);
        echo Html::a('Таблица Оплата', $urlPayment);
        ?>
    </nav>
    <?= CountRow::widget(['table' => $get]) ?>
    <table class = "tableLab2">
    <?php
    switch($get){
        #Таблица апартаменты
        case "apartments":
            echo "<tr>
                    <th>id</th>
                    <th>Адрес</th>
                    <th>Количество жильцов</th>
                    <th>Площадь</th>
                    <th>Ф.И.О</th>
                    <th>Изменить</th>
                    <th>Удалить</th>
                </tr>";
            foreach($apartments as $value){
                echo "<tr>
                        <td>$value->id</td> 
                        <td>$value->adress</td> 
                        <td>$value->living</td> 
                        <td>$value->area м<sup>2</sup></td> 
                        <td>{$value->tenants->Full_name}</td>
                        <td><a class='editlink' href=".Url::to(['crud/update','table' =>$get , 'id' => $value->id]).">&#9998</a></td> 
                        <td><a class='dellink' href='crud/delate?id=$value->id&table=apartments'>&#10005</a></td> 
                    </tr>";
            }
            break;
        #Таблица услуги
        case "services":
            echo "<tr>
                    <th>id</th>
                    <th>Название услуги</th>
                    <th>Единица измерения</th>
                    <th>Цена</th>
                    <th>Изменить</th>
                    <th>Удалить</th>
                </tr>";
            foreach($services as $value){
                echo "<tr>
                        <td>$value->id</td> 
                        <td>$value->type_service</td> 
                        <td>$value->unit</td> 
                        <td>$value->price руб</td> 
                        <td><a class='editlink' href=".Url::to(['crud/update','table' =>$get , 'id' => $value->id]).">&#9998</a></td> 
                        <td><a class='dellink' href='crud/delate?id=$value->id&table=services'>&#10005</a></td> 
                    </tr>";
                }
                break;
        #Таблица владельцы
        case "tenants":
            echo "<tr>
                    <th>id</th>
                    <th>Лицевой счет</th>
                    <th>Ф.И.О</th>
                    <th>Дата рождения</th>
                    <th>Телефон</th>
                    <th>Пол</th>
                    <th>Изменить</th>
                    <th>Удалить</th>
                    </tr>";
            foreach($tenants as $value){
                echo "<tr>
                        <td>$value->id</td> 
                        <td>$value->account</td> 
                        <td>$value->Full_name</td> 
                        <td>$value->birthday</td> 
                        <td>$value->phone</td> 
                        <td>$value->Sex</td> 
                        <td><a class='editlink' href=".Url::to(['crud/update','table' =>$get , 'id' => $value->id]).">&#9998</a></td> 
                        <td><a class='dellink' href='crud/delate?id=$value->id&table=tenants'>&#10005</a></td> 
                        </tr>";
                    }
            break;  
        #Таблица оплата 
        case "payment":
            echo "<tr>
                    <th>id</th>
                    <th>Жилец</th>
                    <th>Услуга</th>
                    <th>Израсходовано</th>
                    <th>Оплать до</th>
                    <th>Оплачено</th>
                    <th>Дата оплаты</th>
                    <th>Изменить</th>
                    <th>Удалить</th>
                    </tr>";
                    
            foreach($payment as $value){
                echo "<tr>
                        <td>$value->id</td> 
                        <td>{$value->tenants->Full_name}</td> 
                        <td>{$value->services->type_service}</td> 
                        <td>$value->spent</td> 
                        <td>$value->pay_by</td> 
                        <td>$value->paid</td> 
                        <td>$value->date_payment</td> 
                        <td><a class='editlink' href=".Url::to(['crud/update','table' =>$get , 'id' => $value->id]).">&#9998</a></td> 
                        <td><a class='dellink' href='crud/delate?id=$value->id&table=payment'>&#10005</a></td> 
                        </tr>";
                    }
            break; 
            
            default:
                echo "<p class='msg'>Выберите таблицу</p>";
            }
            ?>
             </table>
             <?echo "<br><a class='addButton' href=".Url::to(['crud/create','table' =>$get]).">Добавить</a>"?>
</div>
