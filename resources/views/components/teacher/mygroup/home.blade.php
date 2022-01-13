@extends('layouts.appTeacher')


@section('header-content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">กลุ่มโครงงานที่ฉันดูแล</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Mygroup</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')


    <div class="row">

        @php
        $i=0;
        Use App\Models\student\myaccountmodel;
        function getName($id)
        {
            $co = myaccountmodel::find($id);

            if($co){
                return $co->fname.' '.$co->lname;
            }
            return 'ไม่พบข้อมูล';

        }
        @endphp
        @foreach ( $group as  $Group )
        @php
        $i++;
        @endphp
        @include('components.teacher.group.card')
        <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">

                <!-- Add the bg color to the header using any of the bg-* classes -->

                <div class="widget-user-header text-white"
                style="background: url(' ../dist/img/photo1.png') center center;">

                    <h5 class="widget-user-desc text-right">Web Application</h5>
                </div>



                @if ($Group->path_img_group!='')

                <div class="widget-user-image">
                    <img class="img-circle" src="{{ $Group->path_img_group}}" style="width: 95px;height: 95px;" alt="User Avatar">
                </div>
                @else
                <div class="widget-user-image">
                    <img class="img-circle" src="https://cdn-icons-png.flaticon.com/512/219/219983.png" alt="User Avatar">
                </div>
                @endif


                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-12 border-right">
                            <div class="description-block">
                                <p class="widget-user-username " style="font-size: 18px">{{ $Group->group_name}}</p>
                            </div>
                            <!-- /.description-block -->
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">ที่ปรึกษาร่วม</h5>
                                <span class="description-text">1.{{getName($Group->co_teacher)}}</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">ที่ปรึกษาร่วม</h5>
                                <span class="description-text">2. {{getName($Group->co_teacher_2)}}</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">ที่ปรึกษาร่วม</h5>
                                <span class="description-text">3. {{getName($Group->co_teacher_3)}}</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->

                    </div>
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <td>
                                <a href="{{route('Group.show',$Group->id)}}" type="button" class="btn btn-block bg-gradient-success btn-sm ">เข้าดูกลุ่ม</a>

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
        @endforeach


    </div>

@endsection

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
