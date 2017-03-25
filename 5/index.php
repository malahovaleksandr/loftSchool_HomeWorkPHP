<?php
require_once 'oop.php';

$niva = new car();

$niva->direction('back');
$niva->move('60','20');
$niva->typeTransmission('manual');

echo '<br>';
$bmw = new car();

$bmw->direction('forward');
$bmw->move('160','30');
$bmw->typeTransmission('automat');