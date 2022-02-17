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
    @php
         use App\Models\point_transection;
    @endphp
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
                                <th>เครื่องมือ</th>
                                <th>ผู้จัดทำ</th>
                                <th>หัวข้อการสอบ</th>
                                <th>ชื่อโครงงาน</th>


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

                                    if ($calendar->type == 0) {
                                        return $calendar->title . ' ปกติ';
                                    } elseif ($calendar->type == 2) {
                                        return $calendar->title . ' ซ่อมครั้งที่ 1';
                                    } else {
                                        return $calendar->title . ' ซ่อมครั้งที่ 2';
                                    }
                                }

                                function checkaddpoint($id)
                                {
                                    $array = [];
                                    $data = DB::table('point_transection')
                                        ->select('exam_id')
                                        ->where('teacher_id', '=', $id)
                                        ->get();

                                    $i = 0;
                                    foreach ($data as $Data) {
                                        $array[$i] = $Data;
                                        $i++;
                                    }
                                    return $array;
                                }
                            @endphp

                            @php
                                $array = checkaddpoint(Auth::user()->id);

                            @endphp


                            @foreach ($examgroup as $Examgroup)
                                @include('components.teacher.proposal.modal')
                                @csrf
                                @method('post')
                                @if (array_search($Examgroup->exam_id, array_column($array, 'exam_id')) !== false)
                                @else
                                    <tr>
                                        {{ array_search($Examgroup->exam_id, array_column($array, 'exam_id')) }}
                                        <td><button type="modal" class="btn btn-success" data-toggle="modal"
                                                data-target="#modal-success{{ $i }}">
                                                <i class="fas fa-coins"></i>
                                                ลงคะแนน
                                            </button>
                                        </td>

                                        <td>{{ findstd($Examgroup->group) }}</td>
                                        <td>{{ findcalendar($Examgroup->exam_id) }}</td>
                                        <td>{{ findgroup($Examgroup->group) }}</td>

                                    </tr>
                                @endif
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

    @if (Auth::user()->level == 1)
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-body p-0">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">สรุปการสอบ (ประชุม)</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>

                                            <th style="width: 50%">ชื่อโครงงาน</th>
                                            <th>ประเภทการสมัคร</th>
                                            <th>จำนวนอาจารย์ที่ลงทะเบียน</th>
                                            <th>ผลการสอบ</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $j = 1;

                                        function checksum($id)
                                        {
                                            $count = point_transection::where('exam_id', '=', $id)
                                                ->get()
                                                ->count();

                                            return $count;
                                        }
                                    @endphp
                                    <tbody>
                                        @foreach ($point_tran as $Point_tran)
                                            @include('components.teacher.proposal.modal-sum')
                                            <tr>

                                                <td>{{ $Point_tran->group_name }}</td>
                                                <td>{{ $Point_tran->title }}</td>
                                                <td>{{ checksum($Point_tran->id) }}</td>

                                                @if (checksum($Point_tran->id) < 5)
                                                    <td><button class="btn btn-success" data-toggle="modal" disabled>
                                                            <i class="fas fa-coins"></i>
                                                            ยังลงคะแนนไม่ครบ
                                                        </button>
                                                    </td>
                                                @elseif ($Point_tran->status == 'กำลังดำเนินการ')
                                                    <td><button type="modal" class="btn btn-success" data-toggle="modal"
                                                            data-target="#modal-success1{{ $j }}">
                                                            <i class="fas fa-coins"></i>
                                                            สรุปคะแนน
                                                        </button>
                                                    </td>
                                                @else
                                                    <td>
                                                        {{ $Point_tran->status }}
                                                    </td>
                                                @endif
                                                @php
                                                    $j++;
                                                @endphp
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

@endsection

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
