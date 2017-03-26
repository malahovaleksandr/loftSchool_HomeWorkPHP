<?php
require_once 'oop.php';
echo '<b>Задание 5 пункт 1</b><br><br>';
$niva = new car();

$niva->direction('back');
$niva->move('60','20');
$niva->typeTransmission('manual');

echo '<br>';
$bmw = new car();

$bmw->direction('forward');
$bmw->move('160','30');
$bmw->typeTransmission('automat');

echo '<br><br><a href="/5-2/index.php">Пункт 5.2</a>';