@extends('layouts.app')


@section('header-content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">เพิ่มไฟล์</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">fileupload</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
      <h3 class="card-title"></h3>
    </div> <!-- /.card-body -->
    <div class="card-body">

        <div class="form-group">
            <div class="row">
                <div class="col-5"></div>
                <div class="col-5">
                    <div class="btn btn-default btn-file">
                        <i class="fas fa-paperclip"></i> เพิ่มไฟล์
                        <input type="file" name="attachment">
                    </div>
                </div>
                <div class="col-4"></div>
            </div>

        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-3">
        <div class="card-footer">   <span class="oi oi-data-transfer-upload"></span>
            <div class="float-right">
                <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> ส่ง</button>
            </div>
            <button type="reset" class="btn btn-danger"><i class="fas fa-times"></i> ยกเลิก</button>
        </div>
        </div>
        <div class="col-4"></div>

    </div><!-- /.card-body -->
  </div>
@endsection

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
