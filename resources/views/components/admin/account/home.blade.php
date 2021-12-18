@extends('layouts.appAdmin')


@section('header-content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ข้อมูลส่วนตัว</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">FindGroup</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')

<div class="row">

    <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" style="width: 128px;height: 128px;" src="{{ Auth::user()->img }} " alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{ Auth::user()->fname }} {{ Auth::user()->lname }} </h3>

              <p class="text-muted text-center">นักศึกษา</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>ภาควิชา</b> <a class="float-right">วิทยาการคอมพิวเตอร์</a>
                </li>

                <li class="list-group-item">
                  <b>ที่อยู่</b> <a class="float-right">{{ Auth::user()->address }}</a>
                </li>
                <li class="list-group-item">
                    <b>เบอร์โทรศัพท์</b> <a class="float-right">{{ Auth::user()->tel }}</a>
                </li>
                <li class="list-group-item">
                    <b>อีเมล์</b> <a class="float-right">{{ Auth::user()->email }}</a>
                </li>
              </ul>
              @php
                  $id = Auth::user()->id;
              @endphp
              <a href="{{route('Account.show',$id)}}" class="btn btn-primary btn-block"><b>แก้ไขข้อมูล</b></a>
            </div>
            <!-- /.card-body -->
          </div>


    </div><!-- /.col -->
    <div class="col-sm-3">
    </div>
</div>
@endsection
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
