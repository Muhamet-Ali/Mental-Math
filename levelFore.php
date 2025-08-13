<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المستوى الرابع</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/levelTwo.css" />
</head>

<body>
    <div class="container">
        <?php
        session_start();
        include("conn.php");
        if (!isset($_SESSION['isim']) || empty($_SESSION['isim'])) {
            // Giriş yapmamışsa login sayfasına yönlendir
            header("Location:login.php");
            exit();
        }
        if (!isset($_SESSION["levelForeStarted"])) {
            $_SESSION["startTime"] = time(); // Timer'ı yeniden başlat
            $_SESSION["levelForeStarted"] = true;
        }

        $levelId = 4;
        for ($i = 0; $i < 100; $i++) {
            $one = rand(1, 5);
            $two = rand(1, 5);
            $thre = rand(1, 5);
            $ques = "$one+$two+$thre";
            $answer = $one + $two + $thre;
            $_SESSION["ques"] = $ques;
            $_SESSION["answer"] = $answer;
            $result = $connection->query("INSERT INTO question (levelId,ques,answer) VALUES ('$levelId','$ques','$answer') ");
            $_SESSION["idQuestion"] = $connection->insert_id;
        }

        if (!isset($_SESSION["scoreFore"])) {
            $_SESSION["scoreFore"] = 0;
        }
        if (!isset($_SESSION["questionCountFore"])) {
            $_SESSION["questionCountFore"] = 0;
        }
        if (!isset($_SESSION["startTime"])) {
            $_SESSION["startTime"] = time();
        }

        $elapsed = time() - $_SESSION["startTime"];
        $remaining = 420 - $elapsed;

        if ($remaining <= 0) {
            $_SESSION["start_time"] = null;
            header("Location: ForeResult.php");
            // session_destroy();
            exit;
        }
        $dipslayType = rand(0, 1);
        if ($dipslayType == 0) {
            $ques = "<pre style='font-size: 22px;'>  $one\n+ $two</pre>";
        }


        ?>
        <div class="leveltwo">
            <form action="foreCheck.php" method="POST">
                <div class="question"><?php echo " $one+$two+$thre" ?></div>
                <input type="number" name="result" class="form-control" required placeholder="الجواب؟">
                <input type="submit" class="btn btn-success" style="margin-top: 5px;" value="جاوب">
                <input type="button" class="btn btn-danger cnl" value="إلغاء" style="margin-top: 5px;">
            </form>
            <p style="margin-top: 10px;">السؤال: <?php echo $_SESSION["questionCountFore"]; ?> / 100</p>
            <p>النتيجة: <?php echo $_SESSION["scoreFore"]; ?></p>
            <p>الوقت المتبقي: <span id="time"></span></p>
        </div>
    </div>
    <script>
        var remaining = <?php echo $remaining; ?>;

        function startTimer() {
            var timerDisplay = document.getElementById("time");
            function updateTimer() {
                var minutes = Math.floor(remaining / 60);
                var seconds = remaining % 60;
                if (seconds < 10) seconds = "0" + seconds;
                timerDisplay.textContent = minutes + ":" + seconds;
                if (remaining <= 0) {
                    clearInterval(countdown);
                    window.location.href = "foreResult.php";
                }
                remaining--;
            }
            updateTimer(); // ilk başta hemen göster
            var countdown = setInterval(updateTimer, 1000);
        }
        startTimer();

        document.querySelector(".cnl").addEventListener("click", function () {
            window.location.href = "cancel.php";
        });
    </script>
</body>

</html>