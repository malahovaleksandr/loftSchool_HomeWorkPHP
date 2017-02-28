<?php
$example='задание ';
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
echo '<br>'.$example.'2<br><br>';

function arifmetic ($val,$ar){
    switch ($ar) {
        case '+':
            foreach ($val as $value){
                $arif+=$value;
            }
            break;
        case '-':
            foreach ($val as $value){
                $arif-=$value;
            }
            break;
        case '*':
            $arif=1;
            foreach ($val as $value){
                $arif=$value*$arif;
            }
            break;
        case '/':
            $arif=1;
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
$numders=[1,4,7,12,8];
echo arifmetic($numders,'/').'<br>';
echo arifmetic($numders,'*').'<br>';
echo arifmetic($numders,'+').'<br>';
echo arifmetic($numders,'-').'<br>';

//3 не доконца!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
echo '<br>'.$example.'3<br><br>';
function easyCalc ($ar,$val1,$val2,$val3){
    switch ($ar) {
        case '+':
            $arif2=$val1+$val2+$val3;
            echo $val1.' + '.$val2.' + '.$val3.' = '.$arif2;
            break;
        case '-':
            $arif2=$val1-$val2-$val3;
            echo $val1.' - '.$val2.' - '.$val3.' = '.$arif2;
            break;
        case '*':
            $arif2=$val1*$val2*$val3;
            echo $val1.' * '.$val2.' * '.$val3.' = '.$arif2;
            break;
        case '/':
            $arif2=$val1/$val2/$val3;
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
echo '<br>'.$example.'4<br><br>';
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
echo '<br>'.$example.'5<br><br>';

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
