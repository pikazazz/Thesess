<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>


<style>
    /*Downloaded from https://www.codeseek.co/RobVermeer/tinder-swipe-cards-japZpY */
    *,
    *:before,
    *:after {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }


    .tinder {
        width: 100vw;
        height: 550px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        position: relative;
        opacity: 0;
        transition: opacity 0.1s ease-in-out;
    }

    .loaded.tinder {
        opacity: 1;
    }

    .tinder--status {
        position: absolute;
        top: 50%;
        margin-top: -30px;
        z-index: 2;
        width: 100%;
        text-align: center;
        pointer-events: none;
    }

    .tinder--status i {
        font-size: 100px;
        opacity: 0;
        -webkit-transform: scale(0.3);
        transform: scale(0.3);
        transition: all 0.2s ease-in-out;
        position: absolute;
        width: 100px;
        margin-left: -50px;
    }

    .tinder_love .fa-handshake {
        opacity: 0.7;
        -webkit-transform: scale(1);
        transform: scale(1);
    }

    .tinder_nope .fa-remove {
        opacity: 0.7;
        -webkit-transform: scale(1);
        transform: scale(1);
    }

    .tinder--cards {
        flex-grow: 1;
        padding-top: 40px;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: flex-end;
        z-index: 1;
    }

    .tinder--card {
        display: inline-block;
        width: 90vw;
        max-width: 400px;
        background: #FFFFFF;
        padding-bottom: 40px;
        border-radius: 8px;
        overflow: hidden;
        position: absolute;
        will-change: transform;
        transition: all 0.3s ease-in-out;
        cursor: -webkit-grab;
        cursor: grab;
    }

    .moving.tinder--card {
        transition: none;
        cursor: -webkit-grabbing;
        cursor: grabbing;
    }

    .tinder--card img {
        max-width: 100%;
        pointer-events: none;
    }

    .tinder--card h3 {
        margin-top: 32px;
        font-size: 32px;
        padding: 0 16px;
        pointer-events: none;
    }

    .tinder--card p {
        margin-top: 24px;
        font-size: 20px;
        padding: 0 16px;
        pointer-events: none;
    }

    .tinder--buttons {
        flex: 0 0 100px;
        text-align: center;
        padding-top: 20px;
    }

    .tinder--buttons button {
        border-radius: 50%;
        line-height: 60px;
        width: 60px;
        border: 0;
        background: #FFFFFF;
        display: inline-block;
        margin: 0 8px;
    }

    .tinder--buttons button:focus {
        outline: 0;
    }

    .tinder--buttons i {
        font-size: 32px;
        vertical-align: middle;
    }

    .fa-handshake {
        color: #007bff;
    }

    .fa-remove {
        color: #CDD6DD;
    }

</style>

<body>

    <div class="tinder">
        <div class="tinder--status">
            <i class="fa fa-remove"></i>
            <i class="fa fa-handshake"></i>
        </div>

        @php
            use Illuminate\Support\Facades\DB;

            $users = Auth::id();

            $student = DB::table('users')
                ->where('role', 'student')
                ->where('group', null)
                ->where('id', '!=', Auth::user()->id)
                ->where('year', '=', Auth::user()->year)
                ->orderby('email', 'asc')
                ->get();

        @endphp

        <div class="tinder--cards">

            @foreach ($student as $students)

                <div class="tinder--card">
                    <img height="270px" src="{{ $students->img }}">
                    <h3>{{ $students->fname }} {{ $students->lname }}</h3>
                    <p>{{ $students->email }}</p>
                    <input class="studentID" type="number" name="studentID" id="studentID"
                        value="{{ $students->id }}" hidden>
                    <div class="tinder--buttons">
                        <button id="nope" onclick="createButtonListener(false)"><i class="fa fa-remove"></i></button>
                        <button id="love" onclick="setGroup({{Auth::user()->id}},{{ $students->id }})"><i class="fas fa-handshake"></i></button>
                    </div>
                </div>


            @endforeach

        </div>



    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"
        integrity="sha512-UXumZrZNiOwnTcZSHLOfcTs0aos2MzBWHXOHOuB0J/R44QB0dwY5JgfbvljXcklVf65Gc4El6RjZ+lnwd2az2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>


<script>
    /*Downloaded from https://www.codeseek.co/RobVermeer/tinder-swipe-cards-japZpY */
    'use strict';

    var tinderContainer = document.querySelector('.tinder');
    var allCards = document.querySelectorAll('.tinder--card');


    function initCards(card, index) {
        var newCards = document.querySelectorAll('.tinder--card:not(.removed)');

        newCards.forEach(function(card, index) {
            card.style.zIndex = allCards.length - index;
            card.style.transform = 'scale(' + (20 - index) / 20 + ') translateY(-' + 30 * index + 'px)';
            card.style.opacity = (10 - index) / 10;
        });

        tinderContainer.classList.add('loaded');
    }

    initCards();

    allCards.forEach(function(el) {
        var hammertime = new Hammer(el);

        hammertime.on('pan', function(event) {
            el.classList.add('moving');
        });

        hammertime.on('pan', function(event) {
            if (event.deltaX === 0) return;
            if (event.center.x === 0 && event.center.y === 0) return;

            tinderContainer.classList.toggle('tinder_love', event.deltaX > 0);
            tinderContainer.classList.toggle('tinder_nope', event.deltaX < 0);

            var xMulti = event.deltaX * 0.03;
            var yMulti = event.deltaY / 80;
            var rotate = xMulti * yMulti;

            event.target.style.transform = 'translate(' + event.deltaX + 'px, ' + event.deltaY +
                'px) rotate(' + rotate + 'deg)';
        });

        hammertime.on('panend', function(event) {
            el.classList.remove('moving');
            tinderContainer.classList.remove('tinder_love');
            tinderContainer.classList.remove('tinder_nope');

            var moveOutWidth = document.body.clientWidth;
            var keep = Math.abs(event.deltaX) < 80 || Math.abs(event.velocityX) < 0.5;

            event.target.classList.toggle('removed', !keep);

            if (keep) {
                event.target.style.transform = '';
            } else {
                var endX = Math.max(Math.abs(event.velocityX) * moveOutWidth, moveOutWidth);
                var toX = event.deltaX > 0 ? endX : -endX;
                var endY = Math.abs(event.velocityY) * moveOutWidth;
                var toY = event.deltaY > 0 ? endY : -endY;
                var xMulti = event.deltaX * 0.03;
                var yMulti = event.deltaY / 80;
                var rotate = xMulti * yMulti;

                event.target.style.transform = 'translate(' + toX + 'px, ' + (toY + event.deltaY) +
                    'px) rotate(' + rotate + 'deg)';
                initCards();
            }
        });
    });
    let i = 0;

    function createButtonListener(love) {

            var cards = document.querySelectorAll('.tinder--card:not(.removed)');
            var moveOutWidth = document.body.clientWidth * 1.5;


            if (!cards.length) return false;

            var card = cards[0];

            card.classList.add('removed');
            var idStudent = document.querySelectorAll('.studentID');

            if (love) {
                card.style.transform = 'translate(' + moveOutWidth + 'px, -100px) rotate(-30deg)';
                var sender = {!! json_encode($users) !!};
                setGroup(sender, idStudent[i].value);

                i += 1;
            } else {
                card.style.transform = 'translate(-' + moveOutWidth + 'px, -100px) rotate(30deg)';
                i += 1;
            }

            initCards();


    }
</script>

<script>
    function createGist(opts) {
        ChromeSamples.log('Posting request to GitHub API...');
        fetch('http://localhost:8000/api/', {
            method: 'post',
            body: {
                "_token": "{{ csrf_token() }}",
                sender: std_sender,
                receiver: std_receiver
            }
        }).then(function(response) {
            return response.json();
        }).then(function(data) {
            ChromeSamples.log('Created Gist:', data.html_url);
        });
    }

    function setGroup(std_sender, std_receiver) {

        createButtonListener(false);

        $.ajax({
            url: '/api/FindGroup',
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                sender: std_sender,
                receiver: std_receiver
            },
            success: function(response) {
                Swal.fire(
                    'ส่งคำร้องสำเร็จ',
                    'โปรดรอการตอบรับจากคู่โครงงาน',
                    'success'
                )

            }
        });
    }
</script>
