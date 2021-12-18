@extends('layouts.app')


@section('header-content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">วิทยานิพนธ์</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">ขั้นตอนการทำวิทยานิพนธ์</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')

<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Projects</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">
                        ลำดับ
                    </th>
                    <th style="width: 20%">
                        หัวข้อ
                    </th>
                    <th style="width: 30%">
                        คำแนะนำ
                    </th>
                    <th>
                        คะแนนการสอบ
                    </th>
                    <th style="width: 8%" class="text-center">
                        ผลสอบ
                    </th>
                    <th style="width: 20%">
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        1
                    </td>
                    <td>
                        <a>
                            Proposal
                        </a>
                        <br>
                        <small>
                            การนำเสนอหัวข้อโครงงาน
                        </small>
                    </td>
                    <td>
                        <small>
                            -
                        </small>
                    </td>
                    <td class="project_progress">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                            </div>
                        </div>
                        <small>
                            90 Complete
                        </small>
                    </td>
                    <td class="project-state">
                        <span class="badge badge-success">Pass</span>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="far fa-eye"></i>
                            </i>
                            View
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        2
                    </td>
                    <td>
                        <a>
                            บทที่ 1
                        </a>
                        <br>
                        <small>
                            บทบำ
                        </small>
                    </td>
                    <td>
                        <ul class="list-inline">

                        </ul>
                    </td>
                    <td class="project_progress">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%">
                            </div>
                        </div>
                        <small>
                            89% Complete
                        </small>
                    </td>
                    <td class="project-state">
                        <span class="badge badge-success">Pass</span>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="far fa-eye"></i>
                            </i>
                            View
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        3
                    </td>
                    <td>
                        <a>
                            บทที่ 2
                        </a>
                        <br>
                        <small>
                            ทฤษฎีและงานวิจัยที่เกี่ยวข้อง
                        </small>
                    </td>
                    <td>
                        <ul class="list-inline">
                            <small>
                                -
                            </small>
                        </ul>
                    </td>
                    <td class="project_progress">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                            </div>
                        </div>
                        <small>
                            80 Complete
                        </small>
                    </td>
                    <td class="project-state">
                        <span class="badge badge-success">Pass</span>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="far fa-eye"></i>
                            </i>
                            View
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        4
                    </td>
                    <td>
                        <a>
                            บทที่ 3
                        </a>
                        <br>
                        <small>
                            วิธีการดำเนินงานวิจัย

                        </small>
                    </td>
                    <td>
                        <ul class="list-inline">
                            <small>
                                แก้ไขระยะเวลาการดำเนินงาน
                            </small>
                        </ul>
                    </td>
                    <td class="project_progress">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 49%">
                            </div>
                        </div>
                        <small>
                            49% Complete
                        </small>
                    </td>
                    <td class="project-state">
                        <span class="badge badge-success">Not Pass</span>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        5
                    </td>
                    <td>
                        <a>
                            บทที่ 4
                        </a>
                        <br>
                        <small>
                            ผลและการวิเคราะห์ผลการด าเนินงาน
                        </small>
                    </td>
                    <td>
                        <ul class="list-inline">

                        </ul>
                    </td>
                    <td class="project_progress">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                            </div>
                        </div>
                        <small>
                            0
                        </small>
                    </td>
                    <td class="project-state">
                        <span class="badge badge-success">Not Pass</span>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        6
                    </td>
                    <td>
                        <a>
                            บทที่ 5
                        </a>
                        <br>
                        <small>
                            สรุปและข้อเสนอแนะ
                        </small>
                    </td>
                    <td>
                        <ul class="list-inline">

                        </ul>
                    </td>
                    <td class="project_progress">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                            </div>
                        </div>
                        <small>
                            0
                        </small>
                    </td>
                    <td class="project-state">
                        <span class="badge badge-success">Not Pass</span>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                    </td>
                </tr>
                <tr>
            </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>


@endsection

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
