<style>
    @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap");

    body,
    html {
        width: 100%;
        height: 100%;
        margin: 0;
        overflow: hidden;
    }

    body {
        background-color: #121212;
    }

    .container {
        display: flex;
        flex-direction: column;
        align-content: center;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 100%;
    }

    .container>span {
        font-family: "Roboto", sans-serif;
        color: white;
        height: 150px;
        opacity: 0;
    }

    .errorText {
        font-weight: 400;
        font-size: 55px;
        animation-name: unhideText;
        animation-duration: 1s;
        animation-timing-function: ease-in-out;
        animation-fill-mode: both;
        animation-delay: 0.6s;
        display: inline-flex;
        align-items: center;
    }

    .errorSubText {
        font-weight: 300;
        font-size: 40px;
        padding: 0px 50px 0px 50px;
        animation-name: unhideText;
        animation-duration: 1s;
        animation-timing-function: ease-in-out;
        animation-fill-mode: both;
        animation-delay: 0.9s;
        display: inline-flex;
        align-items: center;
    }

    .redirect {
        font-weight: 300;
        font-size: 20px;
        animation-name: unhideText;
        animation-duration: 1s;
        animation-timing-function: ease-in-out;
        animation-fill-mode: both;
        animation-delay: 1.2s;
        display: inline-flex;
        align-items: center;
    }

    .time {
        font-weight: 300;
        font-size: 20px;
        padding-left: 4px;
    }

    @keyframes unhideText {
        0% {
            transform: translateY(52px);
            opacity: 0%;
        }

        100% {
            transform: translateY(0px);
            opacity: 100%;
        }
    }

</style>
<div class="container">
    <span class="errorText">Unknown Error</span>
    <span class="errorSubText">Somethings wrong, thats for sure.</span>
    <span class="redirect">กำลังพาไปยังหน้าหลัก<span class="time"> in 10 seconds</span>...</span>
</div>

<script>
    randError =
        (Math.floor(Math.random() * 2) + 4) * 100 + Math.floor(Math.random() * 5);
    randNumber = Math.floor(Math.random() * 10000);

    urlSearch = "?error=" + randError + "&url=https://example.com/" + randNumber;

    const params = new URLSearchParams(urlSearch);
    const errorData = [{
            error: "0",
            errorText: "Unkown Error",
            errorSubText: "Somethings wrong, thats for sure."
        },
        {
            error: "400",
            errorText: "Error 400 - Bad Request",
            errorSubText: "The server cannot or will not process this request."
        },
        {
            error: "401",
            errorText: "Error 401 - Unauthorized",
            errorSubText: "คุณไม่สิทธิ์เข้าถึงหน้าดังกล่าว"
        },
        {
            error: "403",
            errorText: "Error 403 - Forbidden",
            errorSubText: "You are not allowed to request$errorUrl"
        },
        {
            error: "404",
            errorText: "Error 404 - Not Found",
            errorSubText: "The requested resource$errorUrl was not found or does not exist."
        },
        {
            error: "500",
            errorText: "Error 500 - Internal Server Error",
            errorSubText: "The server is having problems."
        },
        {
            error: "503",
            errorText: "Error 503 - Service Unavailable",
            errorSubText: "The server could not handle your request right now."
        }
    ];

    error = 0;
    errorUrl = "";
    if (params.has("error")) {
        error = params.get("error");
    } else {
        error = 0;
    }
    if (params.has("url")) {
        errorUrl = " " + params.get("url");
    } else {
        errorUrl = "";
    }
    index = 0;
    for (i = 0; i < errorData.length; i++) {
        //console.log(errorData[i].errorText.replace('$errorUrl',errorUrl))
        if (errorData[i].error == {{$errorcode}}) {
            index = i;
        }
    }

    errorText = document.getElementsByClassName("errorText")[0];
    errorSubText = document.getElementsByClassName("errorSubText")[0];
    redirectText = document.getElementsByClassName("redirect")[0];
    secondsText = document.getElementsByClassName("time")[0];

    errorText.innerText = errorData[index].errorText;
    if (error == 401 || error == 403 || error == 404) {
        errorSubText.innerText = errorData[index].errorSubText.replace(
            "$errorUrl",
            errorUrl
        );
    } else {
        errorSubText.innerText = errorData[index].errorSubText;
    }

    secondsText.innerText = " ใน 10 วินาที";
    setTimeout(function() {
        redirectText.classList.add("unhide");
        seconds = 10
        setInterval(function() {
            seconds--;
            if (seconds != 1 && seconds != 0) {
                secondsText.innerText = " ใน " + seconds + " วินาที";
            } else if (seconds == 1) {
                secondsText.innerText = " ใน " + seconds + " วินาที";
            } else {
                seconds = 1;
                secondsText.innerText = "";
                window.location = '../';
            }

        }, 1000)
    }, 1600);
</script>
