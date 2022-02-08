@section('header-content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">เปิดวันสอบ </h1>
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
                @php
                    use App\Models\calendar;

                    $calendar = calendar::get();
                @endphp
                @if (Auth::user()->role == 'teacher')
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
                                        <p style="background-color: green">connected</p>
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
                                        <select id="title" name="title" class="form-control">
                                            <option value="สอบหัวข้อ Proposal">สอบหัวข้อ Proposal</option>
                                            <option value="สอบ บทที่ 1">สอบ บทที่ 1</option>
                                            <option value="สอบ บทที่ 2">สอบ บทที่ 2</option>
                                            <option value="สอบ บทที่ 3">สอบ บทที่ 3</option>
                                            <option value="สอบ บทที่ 4">สอบ บทที่ 4</option>
                                            <option value="สอบ บทที่ 5">สอบ บทที่ 5</option>
                                            <option value="สอบความคืบหน้า 60%">สอบความคืบหน้า 60%</option>
                                            <option value="สอบความคืบหน้า 70%">สอบความคืบหน้า 70%</option>
                                            <option value="สอบความคืบหน้า 80%">สอบความคืบหน้า 80%</option>
                                            <option value="สอบความคืบหน้า 100%">สอบความคืบหน้า 100%</option>
                                        </select>
                                        <!-- /btn-group -->
                                    </div>
                                    <br>
                                    <label>ประเภท : </label>
                                    <div class="input-group">
                                        {{-- <input id="new-event" type="text" class="form-control" placeholder="Event Title"> --}}
                                        <select id="type" name="type" class="form-control">
                                            <option value="0" selected='selected'>สอบปกติ</option>
                                            <option value="1">ซ่อม ครั้งที่ 1</option>
                                            <option value="2">ซ่อม ครั้งที่ 2</option>
                                            <option value="3">ซ่อม ครั้งที่ 3</option>
                                        </select>
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
                                    <label>จำนวนกลุ่ม : </label>
                                    <div class="input-group">
                                        {{-- <input id="new-event" type="text" class="form-control" placeholder="Event Title"> --}}
                                        <input type="number" id="unit" class="form-control" placeholder="ระบุจำนวน">
                                        <!-- /btn-group -->
                                    </div>
                                    <br>
                                    <label>ปีการศึกษา : </label>
                                    <div class="input-group">
                                        <select id="year" name="year" class="form-control">
                                            @php
                                                $year = 56;
                                            @endphp

                                            @for ($i = 2556; $i < 2600; $i++)

                                                <option value="{{ $year++ }}"> {{ $i }}</option>
                                            @endfor


                                        </select>
                                    </div>
                                    <br>
                                    <button id="setdate" type="submit" class="btn btn-primary">เพิ่ม</button>
                                    <!-- /input-group -->

                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">ลบรายการ</h3>
                                </div>

                                <div class="card-body">

                                    <form method="POST" action="{{ route('RegisterExam.destroy', 0) }}">
                                        @csrf
                                        @method('delete')

                                        <select id="delete" name="id" class="form-control">
                                            @foreach ($calendar as $Calendar)
                                                <option value="{{ $Calendar->id }}">{{ $Calendar->title }} ,
                                                    {{ $Calendar->start_date }} </option>
                                            @endforeach

                                        </select>

                                        <br>
                                        <button type="submit" style="width: 100%" class="btn btn-danger"><i
                                                class="fa fa-trash"></i>
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                    @else
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
                                            <p style="background-color: green">connected</p>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                            </div>
                        </div>
                        <div class="col-md-12">
                @endif
                <!-- /.col -->

                <div class="card card-primary">
                    <div class="card-body p-0">
                        <!-- THE CALENDAR -->
                        <div id="calendar"></div>
                    </div>
                    <!-- /.card-body -->
                </div>


                @if (Auth::user()->role == 'teacher')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-body p-0">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">ตารางการสอบที่เปิด</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 25%">หัวข้อโครงงาน</th>
                                                        <th style="width: 15%">Proposal</th>
                                                        <th style="width: 15%">สอบ 60 %</th>
                                                        <th style="width: 15%">สอบ 70 %</th>
                                                        <th style="width: 15%">สอบ 80 %</th>
                                                        <th style="width: 15%">สอบ 100 %</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @php

                                                        function findRegister($i, $x)
                                                        {
                                                            $result = calendar::join('exam_group', 'exam_group.exam_id', '=', 'calendar.id')
                                                                ->select('calendar.title', 'exam_group.created_at', 'exam_group.id', 'exam_group.status', 'calendar.type', 'exam_group.summation')
                                                                ->where('group', '=', $i)
                                                                ->where('title', '=', $x)
                                                                ->orderBy('id', 'desc')
                                                                ->limit(1)
                                                                ->get();

                                                            if (isset($result[0])) {
                                                                if ($result[0]->status == 'ผ่าน') {
                                                                    return '<span class="badge badge-success">' . $result[0]->status . '</span>';
                                                                } elseif ($result[0]->status == 'ไม่ผ่าน') {
                                                                    return '<span class="badge badge-danger">' . $result[0]->status . '</span>';
                                                                }else{
                                                                    return '<span class="badge badge-warning">ยังไม่ได้สมัคร</span>';
                                                                }
                                                            } else {
                                                                return '<span class="badge badge-warning">ยังไม่ได้สมัคร</span>';
                                                            }
                                                        }

                                                    @endphp
                                                    @foreach ($group->unique('group_name') as $Group)
                                                        <tr>
                                                            <td><a href="{{route('Group.show',$Group->group)}}">{{ $Group->group_name }}</a>
                                                            </td>
                                                            <td>
                                                                {!! findRegister($Group->group, 'สอบหัวข้อ Proposal') !!}
                                                            </td>
                                                            <td>
                                                                {!! findRegister($Group->group, 'สอบความคืบหน้า 60%') !!}
                                                            </td>
                                                            <td>
                                                                {!! findRegister($Group->group, 'สอบความคืบหน้า 70%') !!}
                                                            </td>
                                                            <td>
                                                                {!! findRegister($Group->group, 'สอบความคืบหน้า 80%') !!}
                                                            </td>
                                                            <td>
                                                                {!! findRegister($Group->group, 'สอบความคืบหน้า 100%') !!}
                                                            </td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                @endif


                @php

                    use App\Models\teacher\examgroup;

                @endphp
                @if (Auth::user()->role == 'student')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-body p-0">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">ตารางการสอบที่เปิด</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>ชื่อหัวข้อ</th>
                                                        <th>จำนวนที่เปิดรับ</th>
                                                        <th>จำนวนที่สมัคร</th>
                                                        <th>เครื่องมือ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    @php
                                                        $i = 1;
                                                        function showRegis($id)
                                                        {
                                                            $checkCount = examgroup::where('exam_id', '=', $id)
                                                                ->get()
                                                                ->count();
                                                            return $checkCount;
                                                        }
                                                    @endphp
                                                    @foreach ($listbooking as $Listbooking)
                                                        <div class="modal fade"
                                                            id="Listbooking{{ $Listbooking->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">ยืนยันการสอบ</h4>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">


                                                                        @if ($Listbooking->type == '0')
                                                                            ยืนยันการสมัคร {{ $Listbooking->title }}
                                                                            สอบปกติ

                                                                        @elseif ($Listbooking->type == '1')
                                                                            ยืนยันการสมัคร {{ $Listbooking->title }} ซ่อม
                                                                            ครั้งที่ 1

                                                                        @elseif ($Listbooking->type == '2')
                                                                            ยืนยันการสมัคร {{ $Listbooking->title }} ซ่อม
                                                                            ครั้งที่ 2

                                                                        @elseif ($Listbooking->type == '3')
                                                                            ยืนยันการสมัคร {{ $Listbooking->title }} ซ่อม
                                                                            ครั้งที่ 3

                                                                        @endif
                                                                    </div>
                                                                    <form action="{{ route('RegisterExam.store') }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('post')
                                                                        <div class="modal-footer justify-content-between">
                                                                            <input type="text" name="data"
                                                                                value="{{ $Listbooking }}" hidden>
                                                                            <button type="submit" class="btn btn-primary"
                                                                                name="group"
                                                                                value="{{ Auth::user()->group }}">บันทึก</button>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <tr>
                                                            <td>{{ $i++ }}</td>

                                                            @if ($Listbooking->type == '0')
                                                                <td>{{ $Listbooking->title }} สอบปกติ</td>

                                                            @elseif ($Listbooking->type == '1')
                                                                <td>{{ $Listbooking->title }} ซ่อม ครั้งที่ 1</td>

                                                            @elseif ($Listbooking->type == '2')
                                                                <td>{{ $Listbooking->title }} ซ่อม ครั้งที่ 2</td>

                                                            @elseif ($Listbooking->type == '3')
                                                                <td>{{ $Listbooking->title }} ซ่อม ครั้งที่ 3</td>
                                                            @endif

                                                            <td>{{ $Listbooking->unit }}</td>
                                                            <td>{{ showRegis($Listbooking->id) }}</td>
                                                            <td>
                                                                @if (showRegis($Listbooking->id) >= $Listbooking->unit)
                                                                    <button type="" data-toggle="modal"
                                                                        data-target="#Listbooking{{ $Listbooking->id }}"
                                                                        class="btn btn-" disabled>เต็มจำนวน</button>

                                                                @else
                                                                    <button type="submit" data-toggle="modal"
                                                                        data-target="#Listbooking{{ $Listbooking->id }}"
                                                                        class="btn btn-success">สมัครสอบ</button>
                                                                @endif

                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                @endif

                @if (Auth::user()->role == 'student')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-body p-0">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">ประวัติรายการสมัคร</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>ชื่อหัวข้อ</th>
                                                        <th>วันที่สมัคร</th>
                                                        <th>จำนวนคะแนน</th>
                                                        <th>สถานะ</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                    $j = 1;
                                                @endphp
                                                <tbody>
                                                    @foreach ($listbookingMe as $ListbookingMe)
                                                        {{-- <div class="modal fade"
                                                            id="ListbookingMe{{ $ListbookingMe->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">ยืนยันการสอบ</h4>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">


                                                                        @if ($ListbookingMe->type == '0')
                                                                            ยืนยันการสมัคร {{ $ListbookingMe->title }}
                                                                            สอบปกติ

                                                                        @elseif ($ListbookingMe->type == '1')
                                                                            ยืนยันการสมัคร {{ $ListbookingMe->title }}
                                                                            ซ่อม
                                                                            ครั้งที่ 1

                                                                        @elseif ($ListbookingMe->type == '2')
                                                                            ยืนยันการสมัคร {{ $ListbookingMe->title }}
                                                                            ซ่อม
                                                                            ครั้งที่ 2

                                                                        @elseif ($ListbookingMe->type == '3')
                                                                            ยืนยันการสมัคร {{ $ListbookingMe->title }}
                                                                            ซ่อม
                                                                            ครั้งที่ 3

                                                                        @endif
                                                                    </div>
                                                                    <form action="{{ route('RegisterExam.store') }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('post')
                                                                        <div class="modal-footer justify-content-between">
                                                                            <input type="text" name="data"
                                                                                value="{{ $ListbookingMe }}" hidden>
                                                                            <button type="submit" class="btn btn-primary"
                                                                                name="group"
                                                                                value="{{ Auth::user()->group }}">บันทึก</button>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div> --}}
                                                        <tr>
                                                            <td>{{ $j++ }}</td>

                                                            @if ($ListbookingMe->type == '0')
                                                                <td>{{ $ListbookingMe->title }} สอบปกติ</td>

                                                            @elseif ($ListbookingMe->type == '1')
                                                                <td>{{ $ListbookingMe->title }} ซ่อม ครั้งที่ 1</td>

                                                            @elseif ($ListbookingMe->type == '2')
                                                                <td>{{ $ListbookingMe->title }} ซ่อม ครั้งที่ 2</td>

                                                            @elseif ($ListbookingMe->type == '3')
                                                                <td>{{ $ListbookingMe->title }} ซ่อม ครั้งที่ 3</td>
                                                            @endif

                                                            <td>{{ $ListbookingMe->created_at }}</td>
                                                            <td>{{ $ListbookingMe->summation }}</td>
                                                            <td>
                                                                @if (($ListbookingMe->summation / 5) * 100 > 79)
                                                                    <span
                                                                        class="badge badge-success">{{ $ListbookingMe->status }}</span>
                                                                @else 
                                                                    <span
                                                                        class="badge badge-danger">{{ $ListbookingMe->status }}</span>
                                                                @endif

                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                @endif

                <!-- /.col -->
            </div>





            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- /.content-wrapper -->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>


    @if (\Session::has('message'))

        <script>
            Swal.fire(
                'Success',
                '{!! \Session::get('message') !!}',
                '{!! \Session::get('messagetype') !!}',
            )
        </script>

    @endif

    <script>
        function getAlert(image) {
            alert('Here\'s an alert!')
        }
    </script>
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
            var year = document.getElementById('year').value;

            var type = document.getElementById('type').value;



            start_date = new Date(start_date);
            start_date.setDate(start_date.getDate());

            end_date = new Date(end_date);
            end_date.setDate(end_date.getDate());


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
                        'unit': unit,
                        'year': year,
                        'type': type,


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
                        eventid: element.id,
                        title: element.title,
                        start: new Date(y, m, d, h, mi),
                        end: new Date(y2, m2, d2, h2, mi2),
                        backgroundColor: element.backgroundColor, //red
                        borderColor: element.borderColor, //red
                        allDay: element.allDay,
                        unit: element.unit,
                        year: element.year,
                        type: element.type,

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
                    eventMouseEnter: function(event, jsEvent, view) {

                        console.log(event.event._def.extendedProps.eventid);
                        var type = "";
                        if (event.event._def.extendedProps.type == "0") {
                            type = "สอบปกติ";
                        } else if (event.event._def.extendedProps.type == "1") {
                            type = "ซ่อม ครั้งที่ 1";
                        } else if (event.event._def.extendedProps.type == "2") {
                            type = "ซ่อม ครั้งที่ 2";
                        } else if (event.event._def.extendedProps.type == "3") {
                            type = "ซ่อม ครั้งที่ 3";
                        }
                        Swal.fire({
                            title: 'แจ้งเตือนจากระบบ',
                            html: '' + event.event._def.title +
                                "</br>" + 'จำนวนที่เปิดรับ : ' + event.event._def.extendedProps
                                .unit +
                                "</br>" + 'ปีการศึกษา : ' + event.event._def.extendedProps
                                .year +
                                "</br>" + 'ประเภท : ' + type,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()

                            },
                            willClose: () => {

                            }
                        })
                    },

                    eventMouseLeave: function(event, jsEvent, view) {
                        // Swal.fire(
                        //     'Success',
                        //     'Out',
                        //     'success',
                        // )
                    },

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
