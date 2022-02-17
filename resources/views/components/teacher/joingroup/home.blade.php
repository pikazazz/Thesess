@extends('layouts.appTeacher')


@section('header-content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">กลุ่มโครงงานที่ยังไม่มีที่ปรึกษา</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">SendRequest</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')
    @if (\Session::has('messagesok'))
        <script>
            Swal.fire(
                'Success',
                '{!! \Session::get('messagesok') !!}',
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
                                <th>เครื่องมือ</th>
                                <th>ผู้จัดทำ</th>
                                <th>ชื่อโครงงาน</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                                function findstd($id)
                                {
                                    $std = DB::table('users')->find($id);
                                    return $std->fname . ' ' . $std->lname;
                                }
                            @endphp
                            {{-- {{dd($group)}} --}}
                            @foreach ($group as $Group)
                                @include('components.teacher.joingroup.modalApprove')
                                <tr>
                                    <td><button type="modal" class="btn btn-success" data-toggle="modal"
                                            data-target="#modal-success{{ $i }}">
                                            <i class="fas fa-paper-plane"></i>
                                            ส่งคำเชิญ
                                        </button>
                                    </td>
                                    @if ($Group->std_second != '')
                                    <td>{{ findstd($Group->std_first) }},
                                        {{ findstd($Group->std_second) }}</td>
                                @else
                                    <td>{{ findstd($Group->std_first) }}</td>
                                @endif
                                    <td>{{ $Group->group_name }}</td>




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
