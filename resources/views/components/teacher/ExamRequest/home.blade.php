@extends('layouts.appTeacher')


@section('header-content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">รายการยื่นขอสอบ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">ExamRequest</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')

    <div class="row">


        <div class="col-sm-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">รายการ</h3>

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

                                    return $calendar->title;
                                }
                            @endphp
                            @foreach ($examgroup as $Examgroup)
                                @include('components.teacher.ExamRequest.modal')
                                <tr>
                                    <td>{{ findgroup($Examgroup->group) }}</td>
                                    <td>{{ findstd($Examgroup->group) }}</td>
                                    <td>{{ findcalendar($Examgroup->exam_id) }}</td>

                                    <td><button type="modal" class="btn btn-success" data-toggle="modal"
                                            data-target="#modal-success{{ $i }}">
                                        ปรับสถานะ
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
@endsection

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
