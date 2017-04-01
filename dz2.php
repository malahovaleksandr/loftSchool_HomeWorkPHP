<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$example = '<b>задание </b>';
//1
echo $example.'1<br><br>';

function arrayEcho($arr,$true=0){

    if ($true == 0) {

        foreach ($arr as $value) {
            echo '<p>' . $value . ' </p>';
        }
    } else {
        $strAnswer = implode(", ", $arr);
        return $strAnswer;
    }
}
$examp=['first','second','third','fourth'];

arrayEcho($examp);

echo arrayEcho($examp,8);

//2
echo '<br><br>'.$example.'2<br><br>';

function arifmetic ($val,$ar){
    $arif=0;
    switch ($ar) {
        case '+':
            foreach ($val as $value){
                $arif += $value;
            }
            break;
        case '-':
            foreach ($val as $value){
                $arif -= $value;
            }
            break;
        case '*':
            $arif = 1;
            foreach ($val as $value){
                $arif=$value*$arif;
            }
            break;
        case '/':
            $arif = 1;
            foreach ($val as $value){
                $arif=$value/$arif;
            }
            break;
        default:
            echo 'не знаю такого символа';
            break;
    }

    return $arif;
}
$numders = [1,4,7,12,8];
echo arifmetic($numders,'/').'<br>';
echo arifmetic($numders,'*').'<br>';
echo arifmetic($numders,'+').'<br>';
echo arifmetic($numders,'-').'<br>';


echo '<br><br>'.$example.'3<br><br>';
function easyCalc ($ar,$val1,$val2,$val3){
    switch ($ar) {
        case '+':
            $arif2 = $val1+$val2+$val3;
            echo $val1.' + '.$val2.' + '.$val3.' = '.$arif2;
            break;
        case '-':
            $arif2 = $val1-$val2-$val3;
            echo $val1.' - '.$val2.' - '.$val3.' = '.$arif2;
            break;
        case '*':
            $arif2 = $val1*$val2*$val3;
            echo $val1.' * '.$val2.' * '.$val3.' = '.$arif2;
            break;
        case '/':
            $arif2 = $val1/$val2/$val3;
            echo $val1.' / '.$val2.' / '.$val3.' = '.$arif2;
            break;
        default:
            echo 'не знаю такого символа';
            break;
    }
    echo '<br>';

    //return $arif2;
}
easyCalc('+',8,9,2.5);
easyCalc('-',8,9,2.5);
easyCalc('*',8,9,2.5);
easyCalc('/',8,9,2.5);

//4 ---------------------------------------------
echo '<br><br>'.$example.'4<br><br>';
function tableArifmetic($valu1,$value2){
    if(is_int($valu1) && is_int($value2) ){
        echo '<table>';
        for($i=1;$i<=$valu1;$i++){
            echo '<tr> ';
            for($e=1;$e<=$value2;$e++) {
                echo '<td style="padding:5px;"> '.$i.' * '.$e.' </td>';
            }
            echo ' </tr>';
        }
        echo '</table>';
    } else {
        echo 'одной или оба числа не целые';
    }

}
tableArifmetic(6,7);

//5 ---------------------------------------------
echo '<br><br>'.$example.'5<br><br>';

echo 'функция 1<br>';
function revers($word){

    if(strrev(trim($word))==trim($word)){
        $answer= 'true';
    }else {
        $answer= 'false';
    }
    return $answer;
}
echo revers('tetetet').'<br>';
echo revers('tetetsaaset').'<br>';

echo '<br>функция 2<br>';

function inspection($arg){
    if($arg=='true'){
        echo 'правда';
    } elseif ($arg=='false'){
        echo 'ложь';
    }
}
inspection(revers('tetetet'));


//6 ---------------------------------------------
echo '<br><br>'.$example.'6<br><br>';
$time=date("H:i:s m-d-Y ");
echo $time.'<br>';
echo 'unixtime время '.strtotime($time);
// второе задание не понял ---------------------------------------------------------------------------------

//7---------------------------------------------
echo '<br><br>'.$example.'7<br><br>';

$stroke='Карл у Клары украл Кораллы';
$str = str_replace("К","",$stroke);
echo $str.'<br>';

$stroke2='Две бутылки лимонада';
$str2 = str_replace("Две","Три",$stroke2);
echo $str2.'<br>';

//8---------------------------------------------
echo '<br><br>'.$example.'8<br><br>';
$str='RX packets:950381 errors:0 dropped:0 overruns:0 frame:0. :)  ';



//с регулярками пока тяжело найти значение, сделаю как могу пока

function smile(){
    echo '<pre>
░░░░░░░░░░░░░▄▄▄▄▄▄▄▄▄▄▄▄░░░░░░░░░░░░░
░░░░░░░░░▄█▀▀░░░░░░░░░░░░▀▀█▄▄░░░░░░░░
░░░░░░▄█▀░░░░▄█▀▀░░░░░▀▀▄░░░░▀▀▄░░░░░░
░░░░▄▀░░░░░░░▀▄▄▄▄░░░▄▄▄▀░░░░░░░▀▄░░░░
░░░█▀░░░░░░░▄▀░░░░█░█░░░▀█▄░░░░░░░█▄░░
░▄█░░░░░░░░▄▀░░░░░▀█▀░░░░░▀▄░░░░░░░▀▄░
░█░░░░░░░░░█░░▄██████████▄░█░░░░░░░░█▄
█░░░░░░░█░░█▄▄█████▀▀█████░█░░▄░░░░░░█
█░░░░░░░░█▄░░▀▀████▀▀▀▀███▀▀░░█░░░░░░█
█░░░░░░░░░▀▀▀▀░░█▀░░░░░░░▀▄░▀▀░░░░░░░█
█░░░░░▄█▀░░░░░░░█░░░░░░░░▄█░░░░░░░░░░█
█░░░░▄███▄▄▄░░░░░▀▄▄▄▄▄▄█▀░░░▄▄░░░░░░█
█▄░░░▀█░░░█▀▀██▄▄▄░░▀▀▀░░░░░░░░█▄░░░▄█
░█░░░░░░░░█▄▄█▄▄█████▀▀▀████████▀░░░█░
░░█░░░░░░░░░█████████▄▄████▀░░▄█░░░█░░
░░░▀▄░░░░░░▄░▀▀██████████▀░░░░░░░▄█░░░
░░░░▀█▄░░░░░▀▄▄░░▀▀▀▀▀░░░░░░░░░▄█▀░░░░
░░░░░░▀▀▄▄░░░░▀▀▀████▀░░░░░░░▄▀▀░░░░░░
░░░░░░░░░▀▀█▄▄▄░░░░░░░░░▄▄▄▀▀░░░░░░░░░
░░░░░░░░░░░░░▀▀▀▀▀▀▀▀▀▀▀▀░░░░░░░░░░░░░';
}
$pieces = explode(" ", $str);
$pieces2 = explode(":", $pieces['1']);

if(preg_match('/\:\)/', $str)){
    echo 'есть смайл<br>';
    smile();
} else {
    echo ' нет смайла<br>';
    if($pieces2['1']>1000){
        echo 'Сеть есть';
    }

}



//9---------------------------------------------
echo '<br><br>'.$example.'9<br><br>';
$handle = fopen("file.txt", "w");

$fileread ='file.txt';
$text = "Hello, world. I`m will great php developer))";
$test = fwrite($handle, $text);

if ($test){
    echo 'Данные в файл успешно занесены.';
} else {
    echo 'Ошибка при записи в файл.';
}

fclose($handle);
echo '<br>';

function readFiles ($name){
    $handle = fopen($name, "r");
    $homepage = fpassthru($handle);
    fclose($handle);
}

readFiles($fileread);

//10---------------------------------------------
echo '<br><br>'.$example.'10<br><br>';
$file2 = fopen("anothertest.txt", "w");

$text2 = "Hello, again!";
$test2 = fwrite($file2, $text2);

if (!$test2){
    echo 'Ошибка при записи в файл.';
}
$homepage = readfile("anothertest.txt");
fclose($file2);

