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


    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->

            <div class="small-box bg-info">
                <div class="inner">
                    <h3> @php
                        echo sizeof($group);
                    @endphp</h3>

                    <p>กลุ่มโครงงานทั้งหมด</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{ route('DashboardPro.show', 1) }}" class="small-box-footer">
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



                <a href="{{ route('DashboardPro.show', 2) }}" class="small-box-footer">

                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>44</h3>

                    <p>จบการศึกษา</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>
                    <p>อยู่ระหว่างการทำโครงงาน</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <div id="activity" class="activity">

    </div>



    @if ($page == 'list_group')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ค้นหา</h3>
            </div>
            <!-- /.card-header -->
            <div class="row">
                <div class="col">
                    <div class="card-body p-0 m-3">
                        <div class="form-group">
                            <div class="c input-group input-group-lg">
                                <input type="text" id="text" class="form-control form-control-lg" onkeyup="findgroup()"
                                    placeholder="ค้นหาด้วยข้อความ (Free Text)">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- /.card-body -->

        </div>
        <div class="card">

            <div class="card-header">
                <h3 class="card-title">รายชื่อกลุ่ม</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 100px">#</th>
                            <th>ชื่อโครงงาน</th>
                            <th style="width: 100px">สรุปผล</th>
                            <th style="width: 100px">สถานะ</th>
                        </tr>
                    </thead>
                    <tbody id="group_table">
                        @php
                            static $nums = 1;
                        @endphp
                        @foreach ($group as $Group)
                            <tr>
                                <td>{{ $nums++ }}</td>
                                <td> {{ $Group->group_name }}</td>
                                <td><span class="badge bg-warning">ไม่ผ่าน</span></td>
                                <td><span class="badge bg-warning">70%</span></td>

                            </tr>

                        @endforeach



                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

        </div>

    @elseif($page == 'list_student')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ค้นหา</h3>
            </div>
            <!-- /.card-header -->
            <div class="row">
                <div class="col">
                    <div class="card-body p-0 m-3">
                        <div class="form-group">
                            <div class="c input-group input-group-lg">
                                <input type="text" id="text" class="form-control form-control-lg" onkeyup="findname()"
                                    placeholder="ค้นหาด้วยข้อความ (Free Text)">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- /.card-body -->

        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">รายชื่อนักศึกษา</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>ชื่อ - สกุล</th>
                            <th style="width: 80px">กลุ่ม</th>
                            <th style="width: 200px">เบอร์ติดต่อ</th>
                        </tr>
                    </thead>
                    <tbody id="student_table">
                        @php
                            static $nums = 1;
                        @endphp

                        @foreach ($list_std as $List_std)

                            <tr>
                                <td>{{ $nums++ }}</td>
                                <td>{{ $List_std['name'] }}</td>
                                <td><span class="badge bg-primary">1</span></td>
                                <td>{{ $List_std['tel'] }}</td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

        </div>
    @elseif($page == 'list_success')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">list_success</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Task</th>
                            <th>Progress</th>
                            <th style="width: 40px">Label</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td>
                                <div class="progress progress-xs">
                                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-danger">55%</span></td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Clean database</td>
                            <td>
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-warning" style="width: 70%"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-warning">70%</span></td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>Cron job running</td>
                            <td>
                                <div class="progress progress-xs progress-striped active">
                                    <div class="progress-bar bg-primary" style="width: 30%"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-primary">30%</span></td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>Fix and squish bugs</td>
                            <td>
                                <div class="progress progress-xs progress-striped active">
                                    <div class="progress-bar bg-success" style="width: 90%"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-success">90%</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

        </div>
    @elseif($page == 'list_reject')

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">list_reject</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Task</th>
                            <th>Progress</th>
                            <th style="width: 40px">Label</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td>
                                <div class="progress progress-xs">
                                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-danger">55%</span></td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Clean database</td>
                            <td>
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-warning" style="width: 70%"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-warning">70%</span></td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>Cron job running</td>
                            <td>
                                <div class="progress progress-xs progress-striped active">
                                    <div class="progress-bar bg-primary" style="width: 30%"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-primary">30%</span></td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>Fix and squish bugs</td>
                            <td>
                                <div class="progress progress-xs progress-striped active">
                                    <div class="progress-bar bg-success" style="width: 90%"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-success">90%</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

        </div>
    @endif







@endsection

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function findname() {
        //Set id to 0 so you will get all records on page load.
        var text = document.getElementById('text').value;

        $.ajax({
            type: 'get',
            url: `/api/search`,
            data: {
                id: `{{ Auth::user()->id }}`,
                text: text,
            }, //Add request data
            dataType: 'json',

            success: function(data) {
                $('#student_table').html("");
                console.log(data);
                data.forEach(element => {

                    if (typeof element['fname'] !== 'undefined') {
                        $('#student_table').append(`<tr>
                    <td></td>
                                <td>${element['fname']} ${element['lname']}</td>
                                <td><span class="badge bg-primary">1</span></td>
                                <td>${element['tel']}</td>
                            </tr>`);
                    } else {
                        $('#student_table').html("");
                    }
                });

            },
            error: function(e) {
                console.log(e);
            }
        });
    }
</script>
<script>
    function findgroup() {
        //Set id to 0 so you will get all records on page load.
        var text = document.getElementById('text').value;

        $.ajax({
            type: 'get',
            url: `/api/searchgroup`,
            data: {
                id: `{{ Auth::user()->id }}`,
                text: text,
            }, //Add request data
            dataType: 'json',

            success: function(data) {
                $('#group_table').html("");
                data.forEach((element,index)=> {
                    if (typeof element['group_name'] !== 'undefined') {
                        $('#group_table').append(`<tr>
                    <td>${index+1}</td>
                                <td>${element['group_name']}</td>
                                <td><span class="badge bg-primary">1</span></td>
                                <td></td>
                            </tr>`);
                    } else {
                        $('#group_table').html("");
                    }
                });

            },
            error: function(e) {
             
            }
        });
    }
</script>
