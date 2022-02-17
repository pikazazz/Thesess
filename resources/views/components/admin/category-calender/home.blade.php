@extends('layouts.appAdmin')


@section('header-content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">จัดการตารางสอบ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">CalendarEdit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')
    @if (\Session::has('messagesok'))
        <script>
            Swal.fire(
                'Success',
                '{!! \Session::get('messagesok') !!}',
                '{!! \Session::get('messagetype') !!}',
            )
        </script>
    @endif
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('CalendarEdit.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>ชื่อรายการ : </label>
                            <div class="input-group">
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>ปีการศึกษา : </label>
                            <div class="input-group">
                                <select name="year" id="year" class="form-control">
                                    @php
                                        $year = 56;
                                    @endphp
                                    @for ($i = 2556; $i < 2600; $i++)
                                        <option value="{{ $year++ }}"> {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>จำนวนอาจารย์ที่ให้คะแนน : </label>
                            <div class="input-group">
                                <input type="number" name="teacher_number" onkeyup="calpercen()" id="teacher_number"
                                    class="form-control" required>
                                <span class="input-group-text" id="percent"></span>
                            </div>
                        </div>
                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>ชื่อรายการ</th>
                                <th>ปีการศึกษา</th>
                                <th>จำนวนอาจารย์ที่ให้คะแนน</th>
                                <th>เครื่องมือ</th>
                            </tr>
                        </thead>
                        <tbody class="table_student" id="table_student">
                            @php
                                $i = 1;
                            @endphp

                            @foreach ($list_data as $List_data)
                                <tr>
                                    <td>
                                        {{ $i++ }}
                                    </td>
                                    <td>
                                        {{ $List_data->name }}
                                    </td>
                                    <td>
                                        {{ $List_data->year }}
                                    </td>
                                    <td>
                                        {{ $List_data->teacher_number }}
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-warning"
                                            onclick="copy({{$List_data}})">Copy</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function calpercen() {

        var teacher = document.getElementById('teacher_number').value;
        if (100 / teacher == Infinity) {
            $("#percent").html("กรุณากรอกจำนวนอาจารย์");
        } else {
            $("#percent").html("ท่านละ " + 100 / teacher + "%");
        }


    }

    function copy(data) {

        document.getElementById("teacher_number").value = data.teacher_number;
        document.getElementById("name").value = data.name;
        document.getElementById("year").value = data.year;


    }
</script>
