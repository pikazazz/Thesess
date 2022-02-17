@extends('layouts.app')


@section('header-content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ค้นหาคู่โครงงาน</h1>
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

    @include('components.student.group.card')
    <br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form action="{{ route('FindGroup.store') }}" method="post">
                        @csrf
                        @method('post')
                        <input type="text" id="id" name="id" value="{{Auth::user()->id}}" hidden>
                        <button class="form-control btn btn-success">สร้างกลุ่มคนเดียว</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">รายชื่อนักศึกษา</h3>
                    <div class="card-tools">

                        <div class="input-group input-group-sm" style="width: 150px;">

                            <input type="text" id="table_search" onchange="search()" name="table_search"
                                class="form-control float-right" placeholder="Search">
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

                                <th>ชื่อ นามสกุล</th>
                                <th>ปีการศึกษา</th>
                                <th></th>
                                <th>เครื่องมือ</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="table" class="table">

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>


    <br>

    <script>
        Swal.fire(
            'คำเตือน',
            'โปรดเลือกคู่โครงงาน',
            'warning'
        )
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        search()

        function search() {
            $(document).ready(function() {
                $.ajax({
                    type: 'POST',
                    url: '/table',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        key: document.getElementById("table_search").value,
                    },
                    success: function(data) {
                        $(".table").html(data);
                    }
                });
            });
        }
    </script>


    <script>
        function setGroups(std_sender, std_receiver) {
            $.ajax({
                url: '/api/FindGroup',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    sender: std_sender,
                    receiver: std_receiver
                },
                success: function(response) {
                    Swal.fire(
                        'ส่งคำร้องสำเร็จ',
                        'โปรดรอการตอบรับจากคู่โครงงาน',
                        'success'
                    )

                }
            });
        }
    </script>



@endsection

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
