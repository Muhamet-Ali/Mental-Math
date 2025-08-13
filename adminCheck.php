<?php
session_start();

include('conn.php');

// POST verisi varsa kontrol et
if (isset($_POST['adminName']) && isset($_POST['adminPassword'])) {
    $result = $connection->query("SELECT * FROM admin");
    $row = $result->fetch_assoc();

    // Giriş bilgileri doğruysa session'a kaydet
    if ($row['adminName'] == $_POST['adminName'] && $row['adminPassword'] == $_POST['adminPassword']) {
        $_SESSION['adminName'] = $_POST['adminName'];
        $_SESSION['adminPassword'] = $_POST['adminPassword'];
        // Başarılı giriş - admin paneline yönlendir
        header("Location: admin.php"); // veya istediğin sayfa
        exit();
    } else {
        // Yanlış bilgiler - login sayfasına geri gönder
        header("Location: adminLogin.php");
        exit();
    }
} else {
    // POST verisi yoksa login sayfasına yönlendir
    header("Location: adminLogin.php");
    exit();
}