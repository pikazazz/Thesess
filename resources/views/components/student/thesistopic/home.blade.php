
@extends('layouts.app')


@section('header-content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">หัวข้อวิทยานิพนธ์</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">thesistopic</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')

<div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">


        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="inputName">ชื่อโครงงาน</label>
          <input type="text" id="inputName" class="form-control">
        </div>
        <div class="form-group">
          <label for="inputDescription">รายละเอียดโครงงาน</label>
          <textarea id="inputDescription" class="form-control" rows="4"></textarea>
        </div>
        <div class="form-group">
          <label for="inputStatus">ประเภทโครงงาน</label>
          <select id="inputStatus" class="form-control custom-select">
            <option selected="" disabled="">เลือก</option>
            <option>App</option>
            <option>web application</option>
            <option>IOT</option>
            <option>Innovation</option>
          </select>
        </div>
        <div class="form-group">
          <label for="inputClientCompany">ชื่อผู้จัดทำ 1</label>
          <input type="text" id="inputClientCompany" class="form-control">
        </div>
        <div class="form-group">
          <label for="inputProjectLeader">ชื่อผู้จัดทำ 2</label>
          <input type="text" id="inputProjectLeader" class="form-control">
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>

@endsection

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
