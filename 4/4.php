<?php
header('Content-type: text/html; charset=utf-8');
$example='задание ';
//1
echo $example.'1<br><br>';
// строка, которую будем записывать
$text = "<?xml version=\"1.0\"?>
<PurchaseOrder PurchaseOrderNumber=\"99503\" OrderDate=\"1999-10-20\">
  <Address Type=\"Shipping\">
    <Name>Ellen Adams</Name>
    <Street>123 Maple Street</Street>
    <City>Mill Valley</City>
    <State>CA</State>
    <Zip>10999</Zip>
    <Country>USA</Country>
  </Address>
  <Address Type=\"Billing\">
    <Name>Tai Yee</Name>
    <Street>8 Oak Avenue</Street>
    <City>Old Town</City>
    <State>PA</State>
    <Zip>95819</Zip>
    <Country>USA</Country>
  </Address>
  <DeliveryNotes>Please leave packages in shed by driveway.</DeliveryNotes>
  <Items>
    <Item PartNumber=\"872-AA\">
      <ProductName>Lawnmower</ProductName>
      <Quantity>1</Quantity>
      <USPrice>148.95</USPrice>
      <Comment>Confirm this is electric</Comment>
    </Item>
    <Item PartNumber=\"926-AA\">
      <ProductName>Baby Monitor</ProductName>
      <Quantity>2</Quantity>
      <USPrice>39.98</USPrice>
      <ShipDate>1999-05-21</ShipDate>
    </Item>
  </Items>
</PurchaseOrder>
";

// открываем файл, если файл не существует,
//делается попытка создать его
$fp = fopen("data.xml", "w");

// записываем в файл текст
fwrite($fp, $text);


$xml = simplexml_load_file('data.xml');
echo '<pre>';
//print_r($xml);
//print_r($xml['Type']);
foreach ($xml as $info) {
    if($info['Type']){
        echo '<b>'.$info['PartNumber'].'</b><br>';
        echo ' Имя '.$info->Name.'<br>  ';
        echo ' улица '.$info->Street.'<br> ';
        echo ' город '.$info->City.'<br> ';
        echo ' штат '.$info->State.'<br> ';
        echo ' индекс '.$info->Zip.'<br> ';
        echo ' страна '.$info->Country.'<br> ';
    }
    if($info['PartNumber']){
        echo '<b>'.$info['Type'].'</b><br>';
        echo ' название продукта '.$info->ProductName.'<br>  ';
        echo ' качество '.$info->Quantity.'<br> ';
        echo ' цена '.$info->USPrice.'<br> ';
        echo ' дата доставки  '.$info->Comment.'<br> ';
    }

}

//              НЕ ЗАКОНЧИЛ ПЕРВЫЙ ПУНКТ------------------------------------------
$file = file('data.xml');
$i = 0;


//2
echo '<br>'.$example.'2<br><br>';

$array = [
    0 => 'zero',
    1 => "first",
    2 => "second",
    3 => "third",
    4 => array(
        "1.1" => 'new1',
        "1.2" => 'new2'
        )
];
//преобразуем в json
$dec=json_encode($array);

$jsf = fopen("output.json", "w");

// записываем в файл текст
fwrite($jsf, $dec);

 function changeJson($file){
     $fp = file_get_contents($file);
     $json = json_decode($fp,true);
     $newArray=[];

     for($i=0;$i < count($json);++$i){
         if($i==2){
             $json[$i]='change';
         }

         $newArray[]=$json[$i];
     }

     echo 'внесли изменения<br>';
     //print_r($newArray);

     $dec=json_encode($newArray);

     $jsf = fopen("output2.json", "w");

    // записываем в файл текст
     fwrite($jsf, $dec);
 }

$rand=mt_rand(0,30);
if($rand%2==0){
    changeJson("output.json");
} else {
    echo 'Ни чего неменяем';
}
//---------------------------------------СРАВНИТЬ ДВА ФАЙЛА И НАЙТИ ИЗМЕНЕНИЯ
//3
echo '<br>'.$example.'3<br><br>';

$arrayCount=[];
for($i=0;$i<50;++$i){
    $arrayCount[]=mt_rand(1,100);
}
//записываем данные
$jsf = fopen("random.cvs", "w");

fputcsv($jsf, $arrayCount);
//читаем данные из файла и суммируем
$fileCvs = fopen("random.cvs", "r");

$dataCvs = fgetcsv($fileCvs);

$sum=0;
for( $i = 0; $i < count($dataCvs); ++$i ){
    $sum+=$dataCvs[$i];
}
echo '<br> сумма всех чисел из cvs файла '.$sum.'<br>';