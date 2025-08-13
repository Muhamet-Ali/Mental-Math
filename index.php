<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>صفحه حساب ذهني</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/menu.css" />
</head>

<body>
  <?php
  session_start();
  // Kullanıcı giriş yapmış mı kontrol et
  if (!isset($_SESSION['isim']) || empty($_SESSION['isim'])) {
    // Giriş yapmamışsa login sayfasına yönlendir
    header("Location:php\login.php");
    exit();

  }


  include("php/conn.php");

  $id = $_SESSION["student_id"];
  $result = $connection->query("SELECT * FROM students WHERE id='$id' ");
  $row = $result->fetch_assoc(); // satırı dizi olarak al
  $_SESSION["studentIsim"] = $row["isim"];
  ?>

  <header>
    <div class="logo">
      <h1><i class="fa-solid fa-calculator"></i> منصه حساب ذهني</h1>
      <button class="btn btn-primary userBtn"> حسابك الشخصي: <i class="fa-solid fa-user"></i></button>
      <div class="user">
        <p><?php echo "name: " . $row['isim']; ?></p>
        <p><?php echo "phone number: " . $row['tlfNo']; ?></p>
        <p><?php echo "yers old: " . $row['yas']; ?></p>
      </div>
    </div>
    <div class="ust-menu">
      <nav class="ust-nav">
        <a class="mainI" href="">الرئيسه</a>
        <a class="rulesI" href="">القواعد</a>
        <a class="contactI" href="">اتصل بنا</a>
        <a class="levelsI" href="">المستويات</a>
      </nav>

      <div class="main">
        <p>منصه اسس تقدم لكم صفحه حساب ذهني</p>
      </div>
      <div class="rules">
        <p>القواعد موجوه في منتصف الصفحه</p>
      </div>
      <div class="contact">
        <p>الرقم:+12345 2342</p>
        <p>انستا:@bla123</p>
        <p>ايميل:bla@gmail.com</p>
      </div>
      <div class="levels">
        <p>المستوى الاول</p>
        <p>المستوىالثاني</p>
        <p>المستوى الثالث</p>
        <p>المستوى الرابع</p>
      </div>
    </div>
  </header>

  <div class="container">

    <div class="genel">
      <h2>القواعد العامة:</h2>
      <ul>
        <li>كل مستوى يحتوي على <strong>100 عملية</strong>.</li>
        <li>العمليات مقسّمة إلى 5 أنواع حسب عدد الأرقام (3 إلى 7).</li>
        <li>
          يتم كتابة العمليات بشكل <strong>عمودي</strong> في الجمع والطرح.
        </li>
        <li>
          في المستويات الأولى، تستخدم فقط عمليتا
          <strong>الجمع والطرح</strong>.
        </li>
        <li>
          لا يتجاوز الناتج أو مجموع الأرقام <strong>الرقم 99</strong> في
          المراحل الأولى.
        </li>
        <li>
          <img src="image/guzel.jpg" width="100px" style="margin:5px;">
        </li>
      </ul>
    </div>

    <div class="levelContainer">
      <div class="oneTwo">

        <div class="level one">
          <h2>المستوى الأول:</h2>
          <div>
            <ul>
              <li>جمع وطرح بسيط. <i class="fas fa-plus-minus"></i> </li>
              <li>لا يوجد استلاف أو تجاوز العشرات. <i class="fas fa-calculator"></i></li>
              <li>
                أمثلة: <i class="fas fa-abacus"></i>
                <ul>
                  <li>1 + 4 = 5</li>
                  <li>3 + 3 = 6</li>
                  <li>3 + 2 = 5</li>
                </ul>
              </li>
            </ul>
          </div>
        </div>

        <div class="level two">
          <h2>المستوى الثاني:</h2>
          <ul>
            <li>نفس عمليات المستوى الأول + عمليات مركبة:</li>
            <li>
              أمثلة:
              <ul>
                <li>5 + 1 - 4</li>
                <li>5 + 2 - 3</li>
              </ul>
            </li>
            <li>ما زالت النتائج ضمن حدود بسيطة.</li>
          </ul>
        </div>
      </div>
      <div class="threeFour">
        <div class="level three">
          <h2>المستوى الثالث:</h2>
          <ul>
            <li>
              الهدف هو الوصول إلى الرقم <strong>10</strong> باستخدام الجمع.
            </li>
            <li>
              أمثلة:
              <ul>
                <li>9 + 1 = 10</li>
                <li>8 + 2 = 10</li>
                <li>7 + 3 = 10</li>
              </ul>
            </li>
          </ul>
        </div>

        <div class="level four">
          <h2>المستوى الرابع:</h2>
          <ul>
            <li>دمج لكل القواعد السابقة.</li>
            <li>إدخال الرقم 10 كبداية للعملية:</li>
            <li>
              أمثلة:
              <ul>
                <li>10 + 9 - 1</li>
                <li>10 + 8 - 2</li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="ozel">
      <h2>الحالات الخاصة:</h2>
      <ul>
        <li>
          <strong>الضرب:</strong>
          <ul>
            <li>رقم × رقمين أو ثلاث أرقام</li>
            <li>مستويات متقدمة: رقمين × رقمين × رقمين</li>
          </ul>
        </li>
        <li>
          <strong>القسمة:</strong>
          <ul>
            <li>أعداد من 3 إلى 5 خانات ÷ رقمين أو ثلاث</li>
          </ul>
        </li>
        <li>
          <strong>الأعداد العشرية:</strong> لا توجد قواعد خاصة، تُعامل
          كالجمع والطرح دون استلاف أو تجاوز 9.
        </li>
      </ul>
    </div>

    <div class="olaylar">
      <h2>التصفيات والنهائيات:</h2>
      <ul>
        <li>مدة كل مستوى: <strong>7 دقائق</strong>.</li>
        <li>مدة التصفيات: <strong>5 دقائق</strong>.</li>
        <li>
          الانتقال للمستوى التالي يحتاج إلى
          <strong>90% - 100%</strong> نجاح.
        </li>
        <li>
          عرض النتائج بكود فوري + إمكانية مراجعة الأخطاء بعد الاختبار.
        </li>
      </ul>
    </div>

    <div class="">
      <input type="button" name="btn" class="btn btn-primary btn-lg mainBtn" required width="300px"
        value="انتقل للمستوى الاول!!" style="margin-top: 15px;">
    </div>
  </div>

  <footer>
    <div class="icons">
      <i class="fa-brands fa-facebook"></i>
      <i class="fa-brands fa-instagram"></i>
      <i class="fa-brands fa-x-twitter"></i>
      <i class="fa-brands fa-youtube"></i>
    </div>
    <div class="words">
      <p>home</p>
      <p>news</p>
      <p>about</p>
      <p>our Team</p>
    </div>
  </footer>

  <script>
    //main
    document
      .querySelector(".mainI")
      .addEventListener("mouseenter", function () {
        document.querySelector(".main").style.display = "block";
      });
    document
      .querySelector(".mainI")
      .addEventListener("mouseleave", function () {
        document.querySelector(".main").style.display = "none";
      });

    //rules
    document
      .querySelector(".rulesI")
      .addEventListener("mouseenter", function () {
        document.querySelector(".rules").style.display = "block";
      });
    document
      .querySelector(".rulesI")
      .addEventListener("mouseleave", function () {
        document.querySelector(".rules").style.display = "none";
      });

    //contact
    document
      .querySelector(".contactI")
      .addEventListener("mouseenter", function () {
        document.querySelector(".contact").style.display = "block";
      });
    document
      .querySelector(".contactI")
      .addEventListener("mouseleave", function () {
        document.querySelector(".contact").style.display = "none";
      });

    //levels
    document
      .querySelector(".levelsI")
      .addEventListener("mouseenter", function () {
        document.querySelector(".levels").style.display = "block";
      });
    document
      .querySelector(".levelsI")
      .addEventListener("mouseleave", function () {
        document.querySelector(".levels").style.display = "none";
      });
    document.querySelector(".mainBtn").addEventListener("click", function () {
      window.location.href = "php/levelOne.php";
    });

    document.querySelector(".userBtn").addEventListener("mouseenter", function () {
      document.querySelector(".user").style.display = "block";
    });
    document.querySelector(".userBtn").addEventListener("mouseleave", function () {
      document.querySelector(".user").style.display = "none";
    });
  </script>

</body>

</html>