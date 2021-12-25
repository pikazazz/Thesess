@extends('layouts.app')


@section('header-content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ค้นหาอาจารย์ที่ปรึกษา</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">FindTeacher</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')

@isset ($messageSuccess)
<script>
    Swal.fire(
        'ข้อความจากระบบ',
        '{{$messageSuccess}}',
        'success'
    )
</script>
@endisset

    <div class="row">
        @foreach ($teacher as $Teacher)
                <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header text-white"
                            style="background: url('../dist/img/photo1.png') center center;">
                            <h3 class="widget-user-username text-right">อาจารย์</h3>
                            <h5 class="widget-user-desc text-right">วิทยาการคอมพิวเตอร์</h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" style="width: 128px; height: 128px;" src="{{ $Teacher->img }}"
                                alt="User Avatar">
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <br>
                                    <div class="description-block">
                                        <h5 class="description-header">{{ $Teacher->fname }} {{ $Teacher->lname }}</h5>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-5">
                                    <td>
                                        <button type="button" class="btn btn-block bg-gradient-success btn-sm"
                                            data-toggle="modal"
                                            data-target="#modal-default{{ $Teacher->id }}">ส่งคำขอ</button>
                                    </td>
                                </div>

                                <div class="col-sm-3"></div>

                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
                <!-- /.col -->

                @include('components.student.findteacher.card')

        @endforeach

        @include('components.student.findteacher.card')


    </div>




@endsection

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
