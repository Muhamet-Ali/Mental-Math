<?php
session_start();

// Skor ve soru sayısını sıfırla, isim ve student_id dursun
unset($_SESSION["scoreOne"]);
unset($_SESSION["questionCountOne"]);
unset($_SESSION["start_time"]);
unset($_SESSION["answer"]);
unset($_SESSION["ques"]);
unset($_SESSION["idQuestion"]);

header("Location:levelThree.php"); // Oyunu yeniden başlat
exit();
