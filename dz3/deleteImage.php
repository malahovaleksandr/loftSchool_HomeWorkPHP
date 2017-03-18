<?php

include_once 'config.php';

$dbh = new PDO($dsn, $user, $password,$opt);

$sql = "DELETE FROM dataUsers WHERE id =  :id";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
$stmt->execute();
header("Location: ./gallery.php");
