<style>
    .container {
        text-align: center;
        display: block;
        margin: 0 auto;
        top: 30%;
        position: relative;
    }

    button {
        color: white;
        background: #0b1f69;
        box-shadow: none !important;
        border: 2px solid #0b1f69;
        min-width: 6%;
        padding: 5px;
        border-radius: 50px;
        font-family: MONOSPACE;
        font-size: 18px;
    }

    body {
        font-family: MONOSPACE;
    }

    .container .ora,
    .container p {
        font-size: 45px;
        text-transform: uppercase;
        color: #0b1f69;
    }
</style>
<div class="container">
    <span class="ora"> Timer </span>
    <p> <span id="min">00</span>:<span id="sec">00</span>:<span id="msec">00</span></p>
    <button id="start"> Start </button>
    <button id="stop"> Stop </button>
    <button id="restart"> Restart </button>
    <br>
    <br>
    <span class="ora"> Total Money </span>
    <p>฿ <span id="price" name="price">0</span></p>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    window.onload = function() {

        var min = 00;
        var sec = 00;
        var msec = 00;
        var sec2 = 00;
        var elemMin = document.getElementById("min");
        var elemSec = document.getElementById("sec");
        var elemMsec = document.getElementById("msec");
        var bStart = document.getElementById("start");
        var bStop = document.getElementById("stop");
        var bRestart = document.getElementById("restart");

        var Interval;

        bStart.onclick = function() {
            clearInterval(Interval);
            Interval = setInterval(timer, 10);
        }
        bStop.onclick = function() {
            clearInterval(Interval)
        }
        bRestart.onclick = function() {
            clearInterval(Interval);
            sec = "00";
            msec = "00";

            elemMsec.innerHTML = msec;
            elemSec.innerHTML = sec;
        }

        function timer() {
            msec++;

            if (msec <= 9) {
                elemMsec.innerHTML = "0" + msec;
            }
            if (msec > 9) {
                elemMsec.innerHTML = msec;
            }
            if (msec > 99) {

                sec++;
                sec2++;

                if(sec2 * 0.0416666666666667 <= 450){

                    setPrice(0.0416666666666667)
                }


                elemSec.innerHTML = "0" + sec;
                msec = 0;
                elemMsec.innerHTML = "0" + 0;
            }
            if (sec > 9) {
                elemSec.innerHTML = sec;
            }
            if (sec > 59) {

                min++;
                elemMin.innerHTML = "0" + min;
                sec = 0;
                elemSec.innerHTML = "0" + 0;
            }
            if (min > 9) {
                elemMin.innerHTML = min;
            }
        }
    }
</script>

<script>
    var elemprice = document.getElementById("price");
    function setPrice(sec) {
        $.ajax({
            url: '/mymoney/setprice.php',
            type: 'post',
            data: {
                price: sec,
            },
            success: function(response) {
                elemprice.innerHTML = response.substr(0,6);
            }
        });
    }
</script>
