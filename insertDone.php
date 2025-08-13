<?php
include("conn.php");

$ques = $_POST['ques'];
$answer = $_POST['answer'];
$levelId = $_POST['levelId'];

$connection->query("INSERT INTO question (ques, answer, levelId) VALUES ('$ques', '$answer', '$levelId')");
header("Location: admin.php");
exit();



?>