@extends('layouts.appTeacher')


@section('header-content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">กระดานข้อมูล</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')
    <!-- Main content -->

    @php
    use App\Models\teacher\examgroup;
    function checkstatus($status)
    {
        if ($status == 'warning') {
            return '<span class="badge bg-warning">กำลังอยู่ในระหว่างดำเนินการ</span>';
        } elseif ($status == 'success') {
            return '<span class="badge bg-success">ผ่าน</span>';
        } else {
            return '<span class="badge bg-danger">ไม่ผ่าน</span>';
        }
    }

    function checkper($id)
    {
        $count = examgroup::where('group', '=', $id)
            ->where('status', '=', 'ผ่าน')
            ->get()
            ->count();
        if (($count / 5) * 100 > 79) {
            return '<span class="badge bg-success">' . ($count / 5) * 100 . '%</span>';
        } else {
            return '<span class="badge bg-danger">' . ($count / 5) * 100 . '%</span>';
        }
    }
    @endphp


    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->

            <div class="small-box bg-info">
                <div class="inner">
                    @php
                        $groups = 0;
                    @endphp
                    @foreach ($group->unique('group_name') as $Group)
                        @php
                            $groups++;
                        @endphp
                    @endforeach
                    <h3> {{ $groups }}</h3>
                    <p>กลุ่มโครงงานทั้งหมด</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{ route('Dashboard.show', 1) }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3> @php
                        echo sizeof($list_std);
                    @endphp</h3>

                    <p>นักศึกษาทั้งหมด</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>



                <a href="{{ route('Dashboard.show', 2) }}" class="small-box-footer">

                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    @php
                        $end = 0;
                    @endphp
                    @foreach ($groupEnd->unique('group_name') as $Group)
                        @php
                            $end++;
                        @endphp
                    @endforeach
                    <h3> {{ $end }}</h3>

                    <p>จบการศึกษา</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="{{ route('Dashboard.show', 3) }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                    @php
                        $wait = 0;
                    @endphp
                    @foreach ($groupWait->unique('group_name') as $Group)
                        @php
                            $wait++;
                        @endphp
                    @endforeach
                    <h3> {{ $wait }}</h3>
                    <p>อยู่ระหว่างการทำโครงงาน</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <a href="{{ route('Dashboard.show', 4) }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <div id="activity" class="activity">

    </div>



    @if ($page == 'list_group')
        @include('components.teacher.dashbroad.listgroup')


    @elseif($page == 'list_student')
        @include('components.teacher.dashbroad.liststudent')


    @elseif($page == 'list_success')
        @include('components.teacher.dashbroad.listsuccess')

    @elseif($page == 'list_reject')

        @include('components.teacher.dashbroad.listreject')

    @endif







@endsection

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function find(type) {
        //Set id to 0 so you will get all records on page load.
        var text = document.getElementById('text').value;
        $.ajax({
            type: 'get',
            url: `/api/searchkey`,
            data: {
                id: `{{ Auth::user()->id }}`,
                text: text,
                type: type
            }, //Add request data
            dataType: 'json',
            success: function(data) {
                $('#data_table').html("");
                var list = [];
                var i = 1;
                data.forEach((element, index) => {
                    if (typeof element['group_name'] !== 'undefined') {
                        // console.log(list.find(e => e == element['group_name']));
                        // Method (return element > 0).
                        if (list.find(e => e == element['group_name'])) {

                        } else {
                            list.push(element['group_name']);
                            $('#data_table').append(`<tr>
                    <td>${i++}</td>
                                <td>${element['group_name']}</td>
                                <td>${element['checkstatus']}</td>
                                <td>${element['per']}</td>
                            </tr>`);
                        }

                    } else {
                        $('#data_table').html("");
                    }
                });

            },
            error: function(e) {
                console.log(e);
            }
        });
    }

    function findname() {
        //Set id to 0 so you will get all records on page load.
        var text = document.getElementById('text').value;
        $.ajax({
            type: 'get',
            url: `/api/searchkey2`,
            data: {
                id: `{{ Auth::user()->id }}`,
                text: text,
            }, //Add request data
            dataType: 'json',

            success: function(data) {
                $('#data_table').html("");
                console.log(data);
                data.forEach(element => {

                    if (typeof element['fname'] !== 'undefined') {
                        $('#data_table').append(`<tr>
                    <td></td>
                                <td>${element['fname']} ${element['lname']}</td>
                                <td>${element['group_name']}</td>
                                <td>${element['tel']}</td>
                            </tr>`);
                    } else {
                        $('#data_table').html("");
                    }
                });



            },
            error: function(e) {
                console.log(e);
            }
        });
    }
</script>
