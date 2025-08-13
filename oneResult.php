<?php
session_start();
include("conn.php");

// Oturumdan öğrenci ID ve skor
$studentId = $_SESSION["student_id"] ?? null;
$score = $_SESSION["scoreOne"] ?? 0;
$levelid = 1;

//Gerekli bilgiler çekiliyor
$resultStudent = $connection->query("SELECT * FROM students WHERE id = '$studentId'");
$rowStd = $resultStudent->fetch_assoc();
$studentName = $rowStd["isim"] ?? null;

if (!empty($studentName)) {

    // Score tablosunda var mı kontrol
    $resultScore = $connection->query("SELECT * FROM score WHERE studentName = '$studentName' AND levelid = $levelid");
    $rowScore = $resultScore->fetch_assoc();

    if ($rowScore === null) {
        // Yeni kullanıcı skoru ekle
        $connection->query("INSERT INTO score (studentName, score, levelid) VALUES ('$studentName', '$score', '$levelid')");
    } else {
        // Skoru güncelle
        $connection->query("UPDATE score SET score = '$score' WHERE studentName = '$studentName' AND levelid = $levelid");
    }
}

$resultLevel = $connection->query("SELECT * FROM level WHERE id=1");
$rowLevel = $resultLevel->fetch_assoc();
// Buton kontrolü için değişken
$showBtn = ($score >= $rowLevel["gecmeNotu"]);
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>نتائج المتسابقين</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="students">
            <button class="btn btn-danger btnStudent" style="margin:10px">شاهد جميع المتسابقين</button>
            <div class="memebers">
                <?php
                $resultMembers = $connection->query("SELECT * FROM score");
                ?>
                <table class="table table-dark table-striped">
                    <tr>
                        <th>Student Name</th>
                        <th>Score</th>
                        <th>Level</th>
                    </tr>
                    <?php while ($rowMem = $resultMembers->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($rowMem["studentName"]) ?></td>
                            <td><?= htmlspecialchars($rowMem["score"]) ?></td>
                            <td><?= htmlspecialchars($rowMem["levelid"]) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>

        <div class="result">
            <h1>انتهى الاختبار!</h1>
            <p>النتيجة النهائية: <?= $score ?> / 100</p>
            <p>إذا انتهى الوقت سيتم تصفير الأسئلة والنتيجة تلقائيًا.</p>

            <div class="buttons">
                <form action="oneReset.php" method="POST">
                    <button type="submit" class="btn btn-success">ابدأ من جديد</button>
                </form>

                <?php if ($showBtn): ?>
                    <form action="levelTwo.php" method="POST">
                        <button type="submit" class="btn btn-danger">انتقل للمستوى الثاني</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <style>
        .container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .students {
            width: 500px;
            margin: 5px;
            text-align: center;
            padding: 10px;
        }

        .memebers {
            margin: 5px;
            width: 100%;
            display: none;
        }

        .result {
            width: 350px;
            background-color: #badffb;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px,
                rgba(0, 0, 0, 0.3) 0px 30px 60px -30px,
                rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
        }

        .buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .buttons button {
            width: 300px;
        }
    </style>

    <script>
        document.querySelector(".btnStudent").addEventListener("click", function () {
            document.querySelector(".memebers").style.display = "block";
        });

        window.addEventListener("beforeunload", function () {
            navigator.sendBeacon("session_clear.php");
        });

        window.addEventListener("popstate", function () {

            fetch("session_clear.php");
        });
        window.addEventListener("unload", function () {
            // Sunucuya session_clear.php çağrısı yap
            navigator.sendBeacon("session_clear.php");
        });
    </script>
</body>

</html>