<?php  
session_start(); 
include("conn.php");  

$id = $_SESSION["idQuestion"];  
$result = $connection->query("SELECT * FROM question WHERE id='$id' "); 
$row = $result->fetch_assoc(); 

if (!isset($_SESSION["scoreThree"])) {     
    $_SESSION["scoreThree"] = 0; 
}

if (!isset($_SESSION["questionCountThree"])) {     
    $_SESSION["questionCountThree"] = 0; 
}

if($row["answer"] == $_POST["result"]) {     
    $_SESSION["scoreThree"]++;     
}

$_SESSION["questionCountThree"]++;

// 100 soru kontrolü
if ($_SESSION["questionCountThree"] >= 100) {
    // Level Three testi bitti, sonuç sayfasına yönlendir
    header("Location: result.php"); // ya da hangi sayfa ise
} else {
    // Devam et
    header("Location: levelThree.php");
}
?>