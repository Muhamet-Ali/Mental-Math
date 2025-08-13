<?php
// two check sayfasi   
session_start();
include("conn.php");

$id = $_SESSION["idQuestion"];
$result = $connection->query("SELECT * FROM question WHERE id='$id' ");
$row = $result->fetch_assoc();

if (!isset($_SESSION["scoreTwo"])) {
    $_SESSION["scoreTwo"] = 0;
}

if (!isset($_SESSION["questionCountTwo"])) {
    $_SESSION["questionCountTwo"] = 0;
}

if ($row["answer"] == $_POST["result"]) {
    $_SESSION["scoreTwo"]++;
}

$_SESSION["questionCountTwo"]++;

// 100 soru kontrolü
if ($_SESSION["questionCountTwo"] >= 100) {
    // Level Two testi bitti, sonuç sayfasına yönlendir
    header("Location: result.php"); // ya da hangi sayfa ise
} else {
    // Devam et
    header("Location: levelTwo.php");
}
?>