<?php
session_start();
include("conn.php");

$isim = $_POST["isim"];
$tlfNo = $_POST["tlfNo"];
$yas = $_POST["yas"];


$_SESSION["isim"] = $isim;
$_SESSION["tlfNo"] = $tlfNo;
$_SESSION["yas"] = $yas;


$check = $connection->query("SELECT * FROM students WHERE isim = '$isim' ");
if ($check->num_rows > 0) {
    $row = $check->fetch_assoc();
    $_SESSION["student_id"] = $row["id"];
    header("Location:../index.php");
} 
else {
    $result = $connection->query("INSERT INTO students (isim,tlfNo,yas) VALUES('$isim','$tlfNo','$yas') ");
    $_SESSION["student_id"] = $connection->insert_id;
    header("Location:../index.php");
}

?>