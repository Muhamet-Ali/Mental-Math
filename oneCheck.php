<?php
include("conn.php");
session_start();

$id = $_SESSION["idQuestion"];
$result = $connection->query("SELECT answer FROM question WHERE id='$id' ");
$row = $result->fetch_assoc();

if (!isset($_SESSION["scoreOne"])) {
  $_SESSION["scoreOne"] = 0;
}

if (!isset($_SESSION["questionCountOne"])) {
  $_SESSION["questionCountOne"] = 0;
}

$userResult = $_POST["result"];

if ($row["answer"] == $userResult) {
  $_SESSION["scoreOne"]++;
}

$_SESSION["questionCountOne"]++;

// 100 soru kontrolü
if ($_SESSION["questionCountOne"] >= 100) {
  // Test bitti, sonuç sayfasına yönlendir
  header("Location: result.php"); // ya da hangi sayfa ise
} else {
  // Devam et
  header("Location: levelOne.php");
}
?>