<?php
session_start();
session_destroy();
header("Location: ../index.php"); // Ana sayfan neresi ise oraya dön
exit;
?>
