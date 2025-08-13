<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>المستوى الاول </title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../css/levelOne.css" />

</head>

<body>
  <div class="container">
    <?php
    include("conn.php");
    session_start();
    if (!isset($_SESSION['isim']) || empty($_SESSION['isim'])) {
      // Giriş yapmamışsa login sayfasına yönlendir
      header("Location:login.php");
      exit();
    }


    $levelId = 1;
    for ($i = 0; $i < 100; $i++) {
      $one = rand(1, 9);
      $two = rand(1, 9);
      $ques = "$one + $two";
      $answer = $one + $two;
      $_SESSION["ques"] = $ques;
      $_SESSION["answer"] = $answer;
      $result = $connection->query("INSERT INTO question (levelId,ques,answer) VALUES ('$levelId','$ques','$answer') ");
      $_SESSION["idQuestion"] = $connection->insert_id;
    }

    if (!isset($_SESSION["scoreOne"])) {
      $_SESSION["scoreOne"] = 0;
    }

    if (!isset($_SESSION["questionCountOne"])) {
      $_SESSION["questionCountOne"] = 0;
    }



    // Başlama zamanı yoksa başlat
    if (!isset($_SESSION["start_time"])) {
      $_SESSION["start_time"] = time();
    }
    // Süreyi hesapla (7 dk = 420 sn)
    $elapsed = time() - $_SESSION["start_time"];
    $remaining = 420 - $elapsed;////////////////
    
    // Süre bittiyse session sıfırla ve sonucu göster
    if ($remaining <= 0) {
      $_SESSION["start_time"] = null;
      header("Location: oneResult.php");
      // session_destroy();
      exit;
    }

    $dipslayType = rand(0, 1);
    if ($dipslayType == 0) {
      $ques = "<pre style='font-size: 22px;'>  $one\n+ $two</pre>";
    }

    ?>

    <div class="bir">
      <form action="oneCheck.php" method="POST">
        <div class="question"><?php echo $ques . " = "; ?></div>
        <input type="number" name="result" class="form-control" required placeholder="الجواب؟">
        <input type="submit" class="btn btn-success" style="margin-top: 5px;">
        <input type="button" class="btn btn-danger cnl" value="إلغاء" style="margin-top: 5px;">
      </form>

      <p style="margin-top: 10px;">السؤال: <?php echo $_SESSION["questionCountOne"]; ?>/100</p>
      <p>النتيجة: <?php echo $_SESSION["scoreOne"]; ?></p>

      <p>الوقت المتبقي: <span id="time"></span></p>
    </div>
  </div>

  <script>
    // Geri sayım
    var remaining = <?php echo $remaining; ?>;
    // İptal butonu → cancel.php
    document.querySelector(".cnl").addEventListener("click", function () {
      window.location.href = "cancel.php";
    });
  </script>
  <script src="../js/timer.js"></script>

</body>

</html>