@extends('layouts.appTeacher')


@section('header-content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">รายชื่อโครงงาน</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">AddPoint</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')


    @if (\Session::has('message'))

        <script>
            Swal.fire(
                'Success',
                '{!! \Session::get('message') !!}',
                '{!! \Session::get('messagetype') !!}',
            )
        </script>

    @endif
    <div class="row">


        <div class="col-sm-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">รายการทั้งหมด</h3>

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
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ชื่อโครงงาน</th>
                                <th>ผู้จัดทำ</th>
                                <th>หัวข้อการสอบ</th>
                                <th>เครื่องมือ</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                                function findgroup($id)
                                {
                                    $group = DB::table('group')->find($id);

                                    return $group->group_name;
                                }

                                function findstd($id)
                                {
                                    $std = DB::table('group')->find($id);

                                    $std_1 = DB::table('users')->find($std->std_first);
                                    $std_2 = DB::table('users')->find($std->std_second);
                                    return $std_1->fname . ' ' . $std_1->lname . ' , ' . $std_2->fname . ' ' . $std_2->lname;
                                }
                                function findcalendar($id)
                                {
                                    $calendar = DB::table('calendar')->find($id);

                                    if( $calendar->type ==0){
                                        return $calendar->title.' ปกติ';
                                    }else if( $calendar->type ==2){
                                        return $calendar->title.' ซ่อมครั้งที่ 1';
                                    }else{
                                        return $calendar->title.' ซ่อมครั้งที่ 2';
                                    }


                                }
                            @endphp
                            @foreach ($examgroup as $Examgroup)
                                @include('components.teacher.proposal.modal')

                                @csrf
                                @method('post')

                                <tr>
                                    <td>{{ findgroup($Examgroup->group) }}</td>
                                    <td>{{ findstd($Examgroup->group) }}</td>
                                    <td>{{ findcalendar($Examgroup->exam_id) }}</td>

                                    <td><button type="modal" class="btn btn-success" data-toggle="modal"
                                            data-target="#modal-success{{ $i }}">
                                            <i class="fas fa-coins"></i>
                                            ลงคะแนน
                                        </button>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp

                            @endforeach







                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->



        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-body p-0">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ประวัติรายการลงคะแนน</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อโครงงาน</th>
                                        <th>ประเภทการสมัคร</th>
                                        <th>จำนวนคะแนน</th>
                                    </tr>
                                </thead>
                                @php
                                    $j = 1;
                                @endphp
                                <tbody>
                                    @foreach ($point_tran as $Point_tran)
                                        <tr>
                                            <td>{{ $j++ }}</td>
                                            <td>{{ $Point_tran->group_name }}</td>
                                            <td>{{ $Point_tran->title }}</td>
                                            <td>{{ $Point_tran->point }}</td>
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
@endsection

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
