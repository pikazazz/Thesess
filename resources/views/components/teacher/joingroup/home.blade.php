@extends('layouts.appTeacher')


@section('header-content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">รายการคำขอ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">JoinGroup</li>
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
                                <th>รายการสอบ</th>
                                <th>วันที่</th>
                                <th>เครื่องมือ</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @while ($i != 6)


                                @include('components.teacher.joingroup.modalApprove')
                                @include('components.teacher.joingroup.modalReject')
                                <tr>

                                    <td>ระบบหยอดเหรียญ</td>
                                    <td>นายวิศรุต คงจำเนียร</td>
                                    <td>80%</td>
                                    <td>11-7-2014</td>
                                    <td><button type="modal" class="btn btn-success" data-toggle="modal"
                                            data-target="#modal-success{{ $i }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <button type="modal" class="btn btn-danger" data-toggle="modal"
                                            data-target="#modal-danger{{ $i }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>

                                @php
                                    $i++;
                                @endphp
                            @endwhile





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
