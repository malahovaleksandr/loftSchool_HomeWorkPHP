<?php
$example='задание ';
//1
echo $example.'1<br>';

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
echo $example.'2<br>';

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
echo $example.'3<br>';
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
echo $example.'4<br>';