<?php
ini_set("display_errors",1);
error_reporting(E_ALL);

//    1
$name = 'Александр'; // равно разделяй пробелом иначе не читается
$age = 29;

echo 'Меня зовут '.$name;
echo 'Мне '.$age.' лет <br>';
// здесь не правильно, это необходимо экранировать в одну строку
echo '" ! | \ / \'';

$zadanie = '<br><b>Задание номер </b>';
//2
echo $zadanie.'2 <br>';

$allPic = 80;
$flom = 23;
$pancil = 40;
$paint = $allPic-$flom-$pancil;
echo 'Задачи 1.	Дана задача: На школьной выставке '.$allPic.' рисунков. '.$flom.' из них выполнены
 фломастерами, '.$pancil.' карандашами, а остальные — красками. Сколько рисунков, выполненные красками, на школьной выставке? <br>';
echo 'Рисунков нарисованных красками сделано '.$paint.'<br>';

//3
echo $zadanie.'3 <br>';
define('first','23233');
if(defined( 'first') == true){
    echo 'константа существует <br>';
}
echo first.' - значение константа  <br>';

//define('first','23233');
//4
echo $zadanie.'4 <br>';
$age = mt_rand(1,100);
if ( $age > 5 && $age < 65){
    echo 'Вам   еще работать   и   работать. число '.$age;
} elseif ($age>65){
    echo 'Вам   пора   на   пенсию';
} elseif ($age>1&& $age <= 17){
    echo 'Вам   ещё   рано   работать';
} else {
    echo 'Неизвестный   возраст';
}

//5

echo '<br>'.$zadanie.'5 <br>';
$day = mt_rand(0,10);
//$day=9;
echo $day;

// была не правильная конструкция case . надо как сейчас case ЗНАЧЕНИЕ , а у меня было case $day=>1 &&
switch ($day) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        echo "Это   рабочий   день!";
        break;
    case 6:
    case 7:
        echo "Это   выходной   день!";
        break;
    default:
        echo 'Неизвестный   день';
}

//6
echo '<br>'.$zadanie.'6 <br>';
$bmw = [
    'model' => 'X5',
    'speed' => '120',
    'doors' => '5',
    'year' => '2015'
];
$toyota = [
    'model' => 'Camry',
    'speed' => '130',
    'doors' => '4',
    'year' => '2014'
];
$opel = [
    'model' => 'Astra',
    'speed' => '110',
    'doors' => '4',
    'year' => '2013'
];

$cars['bmw'] = $bmw;
$cars['toyota'] = $toyota;
$cars['opel'] = $opel;
echo '<br>';
//print_r($cars);
foreach ($cars as $item => $value){
    echo $item.'<br>';
    echo $value['model'].', '.$value['speed'].', '.$value['doors'].', '.$value['year'].'<br>';
}

//7
echo '<br>'.$zadanie.'7 <br>';
 echo '<table>';
for($i = 1;$i <= 10;$i++){
    echo '<tr>';
    for($e = 1;$e <= 10;$e++) {
        if($i%2 == 0){
            if($e%2 == 0){
                echo '<td>['.$i.' * '.$e.']</td>';
            }else{
                echo '<td>('.$i.' * '.$e.')</td>';
            }

        } else{
            if($e%2 == 0){
                echo '<td>['.$i.' * '.$e.']</td>';
            }else{
                echo '<td>'.$i.' * '.$e.'</td>';
            }

        }

    }
    echo '</tr>';
}
echo '</table>';

echo '<br>'.$zadanie.'8 <br>';
$str = 'word slove case watch';

$pieces = explode(" ", $str);

// здесь у тебя ошибка типа NOTICE - ответ:уже нету
$i = 0;
while ($i < count($pieces)) {
    echo $pieces[$i].'<br>';
     $i++;
}

$newCars = implode("+", $pieces);
echo '<pre>';
print_r($newCars);
