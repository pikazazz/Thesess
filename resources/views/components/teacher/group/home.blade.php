@extends('layouts.appTeacher')


@section('header-content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">รายชื่อกลุ่มโครงงาน</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Group</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->


        </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')



    <div class="row">
        @for ($i = 0; $i < 10; $i++)
            @include('components.teacher.group.card')
            <div class="col-md-4">
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header text-white"
                        style="background: url('../dist/img/photo1.png') center center;">
                        <h3 class="widget-user-username text-right">ชื่อกลุ่ม</h3>
                        <h5 class="widget-user-desc text-right">ทำบนอะไร</h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle" src="../dist/img/user3-128x128.jpg" alt="User Avatar">
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">ใส่อะไรก็ได้</h5>
                                    <span class="description-text">1.</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">ใส่อะไรก็ได้</h5>
                                    <span class="description-text">2.</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">ใส่อะไรก็ได้</h5>
                                    <span class="description-text">3.</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->

                        </div>
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4">
                                <td>
                                    <button type="button" class="btn btn-block bg-gradient-success btn-sm"
                                        data-toggle="modal"
                                        data-target="#modal-default{{$i}}">ส่งคำเชิญ</button>
                                </td>
                            </div>
                            <div class="col-sm-6"></div>

                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
            <!-- /.col -->

        @endfor
    </div>



@endsection

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
