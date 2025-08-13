
 function startTimer() {
            var timerDisplay = document.getElementById("time");
            var countdown = setInterval(function () {
                var minutes = Math.floor(remaining / 60);
                var seconds = remaining % 60;
                if (seconds < 10) seconds = "0" + seconds;
                timerDisplay.textContent = minutes + ":" + seconds;

                if (remaining <= 0) {
                    clearInterval(countdown);
                    window.location.href = "OneResult.php";
                }
                remaining--;
            }, 1000);
        }
        startTimer();















