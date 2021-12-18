@extends('layouts.app')


@section('header-content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">แก้ไขข้อมูลส่วนตัว</h1>
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

<div class="col-md-10">

    <div class="card card-danger">

      <div class="card-body">
        <!-- Date dd/mm/yyyy -->
        <div class="form-group">
          <label>ชื่อ-นามสกุล :</label>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
          </div>
          <!-- /.input group -->
        </div>
        <!-- /.form group -->

        <!-- Date mm/dd/yyyy -->
        <label>ชั้นปีที่ :</label>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
            </div>
            <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask="" inputmode="numeric">
          </div>
          <!-- /.input group -->
        </div>
        <!-- /.form group -->

        <!-- phone mask -->
        <div class="form-group">
          <label>ชื่อวิทยานิพนธ์ :</label>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
            </div>
            <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" inputmode="text">
          </div>
          <!-- /.input group -->
        </div>
        <!-- /.form group -->

        <!-- phone mask -->
        <div class="form-group">
          <label>ที่อยู่ :</label>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
            </div>
            <input type="text" class="form-control" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask="" inputmode="text">
          </div>
          <!-- /.input group -->
        </div>
        <!-- /.form group -->

        <!-- IP mask -->
        <div class="form-group">
          <label>เบอร์โทรศัพท์ :</label>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
            </div>
            <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask="" inputmode="numeric">
          </div>
          <!-- /.input group -->
        </div>
        <!-- /.form group -->


        <!-- IP mask -->
        <div class="form-group">
            <label>อีเมล์ :</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask="" inputmode="numeric">
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

@endsection

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
