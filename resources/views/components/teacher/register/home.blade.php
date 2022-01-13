@extends('layouts.appTeacher')


@section('header-content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">เปิดวันสอบ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Create ExamDate</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="sticky-top mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Events ลากเพื่อระบุวัน</h4>
                            </div>
                            <div class="card-body">
                                <!-- the events -->
                                <div id="external-events">
                                    {{-- <div class="external-event bg-success">Lunch</div>

                                    <div class="checkbox">
                                        <label for="drop-remove">
                                            <input type="checkbox" id="drop-remove">
                                            remove after drop
                                        </label>
                                    </div> --}}
                                    ปิดปรับปรุง
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">สร้างวันสอบ</h3>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                        <ul class="fc-color-picker" id="color-chooser">
                                            <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                                            <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                                            <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                                            <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                                            <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                                        </ul>
                                    </div>
                                    <!-- /btn-group -->
                                    <br>
                                    <label>หัวข้อ : </label>
                                    <div class="input-group">
                                        {{-- <input id="new-event" type="text" class="form-control" placeholder="Event Title"> --}}
                                        <input type="text" class="form-control" id="title" placeholder="ระบุหัวข้อ">
                                        <!-- /btn-group -->
                                    </div>
                                    <br>
                                    <label>วันที่เปิด : </label>
                                    <div class="input-group">
                                        {{-- <input id="new-event" type="text" class="form-control" placeholder="Event Title"> --}}
                                        <input type="datetime-local" id="start_date" class="form-control">
                                        <!-- /btn-group -->
                                    </div>
                                    <br>
                                    <label>วันที่ปิด : </label>
                                    <div class="input-group">
                                        {{-- <input id="new-event" type="text" class="form-control" placeholder="Event Title"> --}}
                                        <input type="datetime-local" id="end_date" class="form-control">
                                        <!-- /btn-group -->
                                    </div>
                                    <br>
                                    <label>จำนวนนักศึกษา : </label>
                                    <div class="input-group">
                                        {{-- <input id="new-event" type="text" class="form-control" placeholder="Event Title"> --}}
                                        <input type="number" id="unit" class="form-control" placeholder="ระบุจำนวน">
                                        <!-- /btn-group -->
                                    </div>
                                    <br>
                                    <button id="setdate" type="submit" class="btn btn-primary">เพิ่ม</button>
                                    <!-- /input-group -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <!-- THE CALENDAR -->
                            <div id="calendar"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- /.content-wrapper -->


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <script>
        /* ADDING EVENTS */
        var currColor = '#3c8dbc' //Red by default
        var r, g, b;
        // Color chooser button
        $('#color-chooser > li > a').click(function(e) {
            e.preventDefault()

            // Save color
            currColor = $(this).css('color')
            // Add color effect to button
            currColor = currColor.split("rgb(");
            currColor = currColor[1].split(")");
            currColor = currColor[0].split(" ");
            b = currColor[2];
            r = currColor[0].split(",")[0];
            g = currColor[1].split(",")[0];
            r = parseInt(r)
            g = parseInt(g)
            b = parseInt(b)
            currColor = "#" + componentToHex(r) + componentToHex(g) + componentToHex(b)


        })

        $('#setdate').click(function(e) {
            e.preventDefault()

            var start_date = document.getElementById('start_date').value;
            var end_date = document.getElementById('end_date').value;
            var title = document.getElementById('title').value;
            var unit = document.getElementById('unit').value;



            start_date = new Date(start_date);
            start_date.setDate(start_date.getDate() + 1);

            end_date = new Date(end_date);
            end_date.setDate(end_date.getDate() + 1);


            console.log(end_date);
            axios({
                    method: 'POST',
                    url: 'http://127.0.0.1:8000/api/calendar',
                    data: {
                        'title': title,
                        'start_date': start_date,
                        'end_date': end_date,
                        'backgroundColor': currColor, //red
                        'borderColor': currColor, //red
                        'allDay': false,
                        'unit': unit
                    }
                })
                .then(response => {
                    let timerInterval
                    Swal.fire({
                        title: 'แจ้งเตือนจากระบบ',
                        text: "เพิ่มตารางการสอบสำเร็จ",
                        icon: 'success',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    }).then((result) => {
                        window.location.reload()
                    })

                })
                .catch(err => {
                    console.log(err.response.data);
                    let timerInterval
                    Swal.fire({
                        title: 'Alert! ตรวจพบข้อผิดพลาด',
                        html: '<p style="color:red;"> "' + err.response.data.errors.title +
                            '"</p>' +
                            '<p style="color:red;"> "' + err.response.data.errors.start_date +
                            '"</p>' +
                            '<p style="color:red;"> "' + err.response.data.errors.end_date +
                            '"</p>' +
                            '<p style="color:red;"> "' + err.response.data.errors.unit +
                            '"</p>' +
                            '<br>หน้าต่างนี้จะปิดลงใน <br><b></b> milliseconds.',

                        timer: 5000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })

                })




        })


        function componentToHex(c) {
            var hex = c.toString(16);
            return hex.length == 1 ? "0" + hex : hex;
        }
    </script>
    <script>
        async function main() {
            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()

            var events = [];

            var carlendar_data = [];


            axios.get('http://127.0.0.1:8000/api/calendar').then(response => {
                carlendar_data.push(response.data)

                response.data.forEach(element => {
                    var date = new Date(element.start_date)
                    var date2 = new Date(element.end_date)
                    var d = date.getDate(),
                        m = date.getMonth(),
                        y = date.getFullYear(),
                        h = date.getHours(),
                        mi = date.getMinutes()
                    var d2 = date2.getDate(),
                        m2 = date2.getMonth(),
                        y2 = date2.getFullYear(),
                        h2 = date2.getHours(),
                        mi2 = date2.getMinutes()

                    events.push({
                        title: element.title,
                        start: new Date(y, m, d, h, mi),
                        end: new Date(y2, m2, d2, h2, mi2),
                        backgroundColor: element.backgroundColor, //red
                        borderColor: element.borderColor, //red
                        allDay: element.allDay
                    })

                    mark_data(events);
                });


            });





        }



        function mark_data(events) {
            $(function() {



                var Calendar = FullCalendar.Calendar;
                var Draggable = FullCalendar.Draggable;

                var containerEl = document.getElementById('external-events');
                var checkbox = document.getElementById('drop-remove');
                var calendarEl = document.getElementById('calendar');

                /* initialize the external events
                 -----------------------------------------------------------------*/
                function ini_events(ele) {
                    ele.each(function() {

                        // create an Event Object (https://fullcalendar.io/docs/event-object)
                        // it doesn't need to have a start or end
                        var eventObject = {
                            title: $.trim($(this)
                                .text()) // use the element's text as the event title
                        }

                        // store the Event Object in the DOM element so we can get to it later
                        $(this).data('eventObject', eventObject)

                        // make the event draggable using jQuery UI
                        $(this).draggable({
                            zIndex: 1070,
                            revert: true, // will cause the event to go back to its
                            revertDuration: 0 //  original position after the drag
                        })

                    })
                }

                ini_events($('#external-events div.external-event'))

                /* initialize the calendar
                 -----------------------------------------------------------------*/
                //Date for the calendar events (dummy data)


                // initialize the external events
                // -----------------------------------------------------------------

                new Draggable(containerEl, {
                    itemSelector: '.external-event',
                    eventData: function(eventEl) {
                        return {
                            title: eventEl.innerText,
                            backgroundColor: window.getComputedStyle(eventEl, null)
                                .getPropertyValue(
                                    'background-color'),
                            borderColor: window.getComputedStyle(eventEl, null)
                                .getPropertyValue(
                                    'background-color'),
                            textColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                                'color'),
                        };
                    }
                });



                var calendar = new Calendar(calendarEl, {
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    themeSystem: 'bootstrap',
                    //Random default events
                    events,
                    editable: false,
                    droppable: false, // this allows things to be dropped onto the calendar !!!
                    drop: function(info) {
                        // is the "remove after drop" checkbox checked?
                        if (checkbox.checked) {
                            // if so, remove the element from the "Draggable Events" list
                            info.draggedEl.parentNode.removeChild(info.draggedEl);
                        }
                    }
                });

                calendar.render();

                // $('#calendar').fullCalendar()


                $('#add-new-event').click(function(e) {
                    e.preventDefault()
                    // Get value and make sure it is not null
                    var val = $('#new-event').val()

                    if (val.length == 0) {
                        return
                    }

                    console.log(val);
                    // Create events
                    var event = $('<div />')
                    event.css({
                        'background-color': currColor,
                        'border-color': currColor,
                        'color': '#fff'
                    }).addClass('external-event')

                    event.text(val)
                    $('#external-events').prepend(event)

                    // Add draggable funtionality
                    ini_events(event)

                    // Remove event from text input
                    $('#new-event').val('')
                })


            })
        }


        main()
    </script>


@endsection

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
