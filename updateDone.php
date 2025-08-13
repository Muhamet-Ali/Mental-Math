<?php
include("conn.php");

$id = $_POST['id'];
$ques = $_POST['ques'];
$answer = $_POST['answer'];
$levelId = $_POST['levelId'];
$result = $connection->query("UPDATE question SET ques='$ques', answer='$answer', levelId='$levelId' WHERE id= '$id' ");
header("Location: admin.php");
exit();

?>