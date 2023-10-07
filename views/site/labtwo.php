<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$this->title = 'Лабораторная работа №2';
$this->params['breadcrumbs'][] = $this->title;
$urlApartments = Url::to(['labtwo','table'=>'apartments']);
$urlServices = Url::to(['labtwo','table'=>'services']);
$urlTenants = Url::to(['labtwo','table'=>'tenants']);
$urlPayment = Url::to(['labtwo','table'=>'payment']);

$urlQueryOne = Url::to(['labtwo','table'=>'queryOne']);
$urlQueryTwo = Url::to(['labtwo','table'=>'queryTwo']);
$urlQueryThree = Url::to(['labtwo','table'=>'queryThree']);
$urlQueryFour = Url::to(['labtwo','table'=>'queryFour']);
$urlQueryFive = Url::to(['labtwo','table'=>'queryFive']);

$get = Yii:: $app ->request->get('table');
?>
<div>
    <h2 class = 'lab'>Лабораторная работа №2</h2>
    <nav class="navbarLab2">
        <?php
        echo Html::a('Таблица Апартаменты', $urlApartments);
        echo Html::a('Таблица Услуги', $urlServices);
        echo Html::a('Таблица Жильцы', $urlTenants);
        echo Html::a('Таблица Оплата', $urlPayment);
        ?>
    </nav>
    <nav class="navbarLab2">
        <?php
        echo Html::a('Запрос №1', $urlQueryOne);
        echo Html::a('Запрос №2', $urlQueryTwo);
        echo Html::a('Запрос №3', $urlQueryThree);
        echo Html::a('Запрос №4', $urlQueryFour);
        echo Html::a('Запрос №5', $urlQueryFive);
        ?>
    </nav>
    <div class='labTwoContainer'>
        <div class = 'forms'>
        <?php switch($get){
        case "queryOne":
            echo "<br><h4>Информация о квартирах площадью от 48 до 65 м<sup>2</sup></h4>";
            $form = ActiveForm::begin();
            echo $form->field($queryOne,'area_one')->label('От');
            echo $form->field($queryOne,'area_two')->label('До');
            echo Html::submitButton('Отправить', ['class' => 'btn btn-success']);
            ActiveForm::end();
            break;
        case "queryTwo":
            $form = ActiveForm::begin();
            echo $form->field($queryTwo,'adress')->label('Введите адрес:');
            echo Html::submitButton('Отправить', ['class' => 'btn btn-success']);
            ActiveForm::end();
            break;
        case "queryThree":
            $form = ActiveForm::begin();
            echo $form->field($queryThree,'adress')->label('Введите адрес:');
            echo Html::submitButton('Отправить', ['class' => 'btn btn-success']);
            ActiveForm::end();
            break;    
        case "queryFour":
            $form = ActiveForm::begin();
            echo $form->field($queryFour,'adress')->label('Введите адрес:');
            echo Html::submitButton('Отправить', ['class' => 'btn btn-success']);
            ActiveForm::end();
            break;  
        case "queryFive":
            $form = ActiveForm::begin();
                echo $form->field($queryFive,'month')->label('Месяц')->dropDownList([
                    '1' => 'Январь',
                    '2' => 'Февраль',
                    '3' => 'Март',
                    '4' => 'Апрель',
                    '5' => 'Май',
                    '6' => 'Июнь',
                    '7' => 'Июль',
                    '8' => 'Август',
                    '9' => 'Сентябрь',
                    '10' => 'Октябрь',
                    '11' => 'Ноябрь',
                    '12' => 'Декабрь',
                ]);
                echo Html::submitButton('Отправить', ['class' => 'btn btn-success']);
                ActiveForm::end();
            break;  
    }?>
        </div>
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
                </tr>";
            foreach($apartments as $value){
                echo "<tr>
                        <td>$value->id</td> 
                        <td>$value->adress</td> 
                        <td>$value->living</td> 
                        <td>$value->area м<sup>2</sup></td> 
                        <td>{$value->tenants->Full_name}</td>
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
                </tr>";
            foreach($services as $value){
                echo "<tr>
                        <td>$value->id</td> 
                        <td>$value->type_service</td> 
                        <td>$value->unit</td> 
                        <td>$value->price руб</td> 
                    </tr>";
                }
                break;
        #Таблица владельцы
        case "tenants":
            echo "<tr>
                    <th>id</th>
                    <th>Лицевой счет</th>
                    <th>Ф.И.О</th>
                    <th>Телефон</th>
                    <th>Пол</th>
                    </tr>";
            foreach($tenants as $value){
                echo "<tr>
                        <td>$value->id</td> 
                        <td>$value->account</td> 
                        <td>$value->Full_name</td> 
                        <td>$value->phone</td> 
                        <td>$value->Sex</td> 
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
                        </tr>";
                    }
            break; 
        #Запрос №1  
        case "queryOne":
        if (!empty($queryOne->area_one) && !empty($queryOne->area_two)){
            echo "<tr>
            <th>id</th>
            <th>Адрес</th>
            <th>Количество жильцов</th>
            <th>Площадь</th>
            <th>Ф.И.О</th>
        </tr>";
            $query = $queryOne->getQuery();
            foreach($query as $value){
                    echo "<tr>
                            <td>$value->id</td> 
                            <td>$value->adress</td> 
                            <td>$value->living</td> 
                            <td>$value->area м<sup>2</sup></td> 
                            <td>{$value->tenants->Full_name}</td>
                        </tr>";
                    }
        }

                break; 
            #Запрос №2  
            case "queryTwo":
                echo "<br><h4>Информация о квартире с максимальным количеством жильцов по адресу ул.Малиновского 117ф</h4>";
                if (!empty($queryTwo->adress)){
                echo "<tr>
                        <th>id</th>
                        <th>Адрес</th>
                        <th>Количество жильцов</th>
                        <th>Площадь</th>
                        <th>Ф.И.О</th>
                     </tr>";
                     $query = $queryTwo->getQuery();
                foreach($query as $value){
                    echo "<tr>
                            <td>$value->id</td> 
                            <td>$value->adress</td> 
                            <td>$value->living</td> 
                            <td>$value->area м<sup>2</sup></td>  
                            <td>{$value->tenants->Full_name}</td> 
                            </tr>";
                        }
                    }
                break; 
            #Запрос №3  
            case "queryThree":
                echo "<br><h4>Количество израсходованной электроэнергии по адресу ул. Ларина 2, кв.11</h4>";
                if (!empty($queryThree->adress)){
                echo "<tr>
                        <th>Ф.И.О</th>
                        <th>Адрес</th>
                        <th>Месяц</th>
                        <th>Расход</th>
                     </tr>";
                     $query = $queryThree->getQuery();
                foreach($query as $value){
                    echo "<tr>
                            <td>{$value['Full_name']}</td> 
                            <td>{$value['adress']}</td> 
                            <td>{$value['month']}</td> 
                            <td>{$value['spent']}кВт</td> 
                            </tr>";
                        }
                    }
                break; 
            #Запрос №4
            case "queryFour":
                    echo "<br><h4>Ф.И.О. квартиросъемщика, проживающего по адресу ул. Ларина 2,
                    кв.11
                    </h4>";
                    if (!empty($queryFour->adress)){
                    echo "<tr>
                    <th>Квартиросъемщик</th>
                    <th>Адрес</th>
                    <th>Проживает человек</th>
                    <th>Площадь</th>
                    
                 </tr>";
                    $query = $queryFour->getQuery();
                    foreach($query as $value){
                    echo "<tr>
                    <td>{$value->tenants->Full_name}</td> 
                    <td>{$value->adress}</td> 
                    <td>{$value->living}</td> 
                    <td>{$value->area} м<sup>2</sup></td> 
                     
                    </tr>";
                    }
                    }
                    break; 
            #Запрос №5  
            case "queryFive":
                echo "<br><h4> Квартиросъемщик(и), не своевременно оплативших услуги в
                прошлом месяце                
                </h4>";
                if (!empty($queryFive->month)){
                echo "<tr>
                <th>Лицевой счет</th>
                <th>Ф.И.О</th>
                <th>Услуга</th>
                <th>Оплатить до</th>
                <th>Оплачена</th>
                <th>Дата оплаты</th>
                </tr>";
                $query = $queryFive->getQuery();
                foreach($query as $value){
                    echo "<tr>
                            <td>$value->lodger</td> 
                            <td>{$value->tenants->Full_name}</td>
                            <td>{$value->services->type_service}</td>  
                            <td>$value->pay_by</td> 
                            <td>$value->paid</td> 
                            <td>$value->date_payment</td> 
                            </tr>";
                        }
                    }
                    break; 
        default:
            echo "<p class='msg'>Выберите таблицу</p>";
    }
    ?>
    </table>
</div>
</div>
