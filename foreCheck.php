<?php
session_start();
include("conn.php");

$id = $_SESSION["idQuestion"];

$result = $connection->query("SELECT * FROM question WHERE id='$id' ");
$row = $result->fetch_assoc();

if (!isset($_SESSION["scoreFore"])) {
    $_SESSION["scoreFore"] = 0;
}

if (!isset($_SESSION["questionCountFore"])) {
    $_SESSION["questionCountFore"] = 0;
}

if ($row["answer"] == $_POST["result"]) {
    $_SESSION["scoreFore"]++;
}

$_SESSION["questionCountFore"]++;

// 100 soru kontrolü
if ($_SESSION["questionCountFore"] >= 100) {
    // Level Four testi bitti, sonuç sayfasına yönlendir
    header("Location: result.php"); // ya da hangi sayfa ise
} else {
    // Devam et
    header("Location: levelFore.php");
}
?>