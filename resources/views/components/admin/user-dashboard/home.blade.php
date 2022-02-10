@extends('layouts.appAdmin')


@section('header-content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">เพิ่มนักศึกษา</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">AddSutudent</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')


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
                <form action="{{ route('UserDashboard.store') }}" method="POST">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ชื่อจริง</label>
                            <input type="text" class="form-control" id="fname" name="fname" value="" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">นามสกุล</label>
                            <input type="text" class="form-control" id="lname" name="lname" value="" required>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">รหัสนักศึกษา / รหัสอาจารย์</label>
                            <input type="text" class="form-control" id="username" name="username" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">สถานะ</label>
                            <select class="form-control" name="role" id="role" required>
                                <option value="" selected="selected">
                                    -- โปรดเลือก --
                                </option>
                                <option value="student">นักศึกษา</option>
                                <option value="teacher">อาจารย์</option>
                                <option value="admin">ผู้ดูแลระบบ</option>
                                </option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">รหัสผ่าน</label>
                            <input type="password" class="form-control" minlength="8" id="password" name="password"
                                value="" required>
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
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="http://203.158.101.9/RTF/file.php" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ผู้อัพโหลด</label>
                            <input type="email" class="form-control" id="name" name="name"
                                value="{{ Auth::user()->fname }} {{ Auth::user()->lname }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="file_img" class="custom-file-input" id="file_img">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
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
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">นักศึกษา</h3>
                    <div class="card-tools">

                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="student_search" id="student_search" onkeyup="findname()"
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
                <!-- form start -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>ชื่อ นามสกุล</th>
                                            <th>อีเมล์</th>
                                            <th>ระดับผู้ใช้</th>
                                            <th>ปีการศึกษา</th>
                                            <th>เบอร์โทร</th>
                                            <th></th>
                                            <th>เครื่องมือ</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="table_student" id="table_student">
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($student as $std)
                                            @include('components.admin.user-dashboard.modal')
                                            @if ($std->role != 'teacher')
                                                <tr>

                                                    <td>{{ $i + 1 }}</td>
                                                    <td>{{ $std->fname }} {{ $std->lname }}</td>
                                                    <td>{{ $std->email }}</td>
                                                    <td>{{ $std->role }}</td>
                                                    <td>{{ $std->year }}</td>
                                                    <td>{{ $std->tel }}</td>
                                                    <td>
                                                        <button type="modal" class="btn btn-warning" data-toggle="modal"
                                                            data-target="#modal-success{{ $std->id }}">
                                                            <i class="fas fa-pen"></i>
                                                        </button>
                                                    </td>
                                                    @php
                                                        $i++;
                                                    @endphp
                                                    <td class="col-md-1">
                                                        <form action="{{ route('UserDashboard.destroy', $std->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </form>
                                                    </td>

                                                </tr>
                                            @endif

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">อาจารย์</h3>
                    <div class="card-tools">

                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" id="teacher_search" onkeyup="findnameteacher()" class="form-control float-right"
                                    placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>

                    </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID </th>
                                            <th>ชื่อ นามสกุล</th>
                                            <th>อีเมล์</th>
                                            <th>ระดับผู้ใช้</th>
                                            <th>สิทธิ์การใช้งาน</th>
                                            <th>เบอร์ติดต่อ</th>
                                            <th></th>
                                            <th>เครื่องมือ</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_teacher" class="table_teacher">
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($teacher as $tea)
                                        @include('components.admin.user-dashboard.modalTeacher')
                                            @if ($tea->role != 'student')
                                                <tr >
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $tea->fname }} {{ $tea->lname }}</td>
                                                    <td>{{ $tea->email }}</td>
                                                    <td>{{ $tea->role }}</td>
                                                    <td>{{ $tea->level }}</td>
                                                    <td>{{ $tea->tel }}</td>
                                                    <td>
                                                        <button type="modal" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#modal-successs{{ $tea->id }}">
                                                        <i class="fas fa-pen"></i>
                                                    </button>

                                                    </td>
                                                    <td class="col-md-1">
                                                        <form action="{{ route('UserDashboard.destroy', $tea->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </form>
                                                    </td>

                                                </tr>
                                            @endif
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    @isset($messages)
        <script>
            Swal.fire(
                'พบผู้ใช้งานซ้ำในระบบ',
                '{{ $messages }}',
                'error'
            )
        </script>
    @endisset
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @isset($message)
        @switch($message)

            @case('1')
                <script>
                    Swal.fire(
                        'อัพโหลดไม่สำเร็จ',
                        'Sorry, file already exists.',
                        'error'
                    )
                </script>
            @break
            @case('2')
                <script>
                    Swal.fire(
                        'อัพโหลดไม่สำเร็จ',
                        'Sorry, your file is too large.',
                        'error'
                    )
                </script>
            @break
            @case('3')
                <script>
                    Swal.fire(
                        'อัพโหลดไม่สำเร็จ',
                        'Sorry, only rtf files are allowed.',
                        'error'
                    )
                </script>
            @break

            @case('4')
                <script>
                    Swal.fire(
                        'อัพโหลดไม่สำเร็จ',
                        'Sorry, your file was not uploaded.',
                        'error'
                    )
                </script>
            @break
            @case('5')
                <script>
                    Swal.fire(
                        'อัพโหลดสำเร็จ',
                        'The file has been uploaded.',
                        'success'
                    )

                    fetch(`{{ route('export.create', 'ssss') }}`)
                        .then(resp => resp.blob())
                        .then(blob => {
                            const url = window.URL.createObjectURL(blob);
                            const a = document.createElement('a');
                            a.style.display = 'none';
                            a.href = url;
                            // the filename you want
                            a.download = 'UserPassword.xlsx';
                            document.body.appendChild(a);
                            a.click();
                            window.URL.revokeObjectURL(url);
                        })

                    fetch(`api/delexport`)
                </script>
            @break

            @case('6')
                <script>
                    Swal.fire(
                        'อัพโหลดไม่สำเร็จ',
                        'Sorry, there was an error uploading your file.',
                        'error'
                    )
                </script>
            @break

            @default

        @endswitch
    @endisset

@endsection

<script>
    function findname() {
        //Set id to 0 so you will get all records on page load.
        var text = document.getElementById('student_search').value;

        $.ajax({
            type: 'get',
            url: `/api/search`,
            data: {
                id: `{{ Auth::user()->id }}`,
                text: text,
            }, //Add request data
            dataType: 'json',

            success: function(data) {
                $('#table_student').html("");
                var i = 1;
                var id;
                console.log(data);
                data.forEach(element => {
                    if (typeof element['fname'] !== 'undefined') {
                        $('#table_student').append(`
                        <tr>
                            <td>${i++}</td>
                            <td>${element['fname']}  ${element['lname']} </td>
                            <td>${element['email']}</td>
                            <td>${element['role']}</td>
                            <td>${element['year']}</td>
                            <td>${element['tel']} </td>
                            <td>
                                <button type="modal"  class="btn btn-warning" data-toggle="modal"
                                data-target="#modal-success${element['id']}">
                                <i class="fas fa-pen"></i>
                            </button>
                        </td>

                        <td class="col-md-1">
                            <form action="/UserDashboard/${element['id']}"
                                method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit"  class="btn btn-danger"><i
                                    class="fas fa-trash"></i></button>
                                </form>
                            </td>
                            </tr>`);
                    } else {
                        $('#table_student').html("");
                    }
                });

            },
            error: function(e) {
                console.log(e);
            }
        });
    }


    function findnameteacher() {
        //Set id to 0 so you will get all records on page load.
        var text = document.getElementById('teacher_search').value;

        $.ajax({
            type: 'get',
            url: `/api/searchteacher`,
            data: {
                id: `{{ Auth::user()->id }}`,
                text: text,
            }, //Add request data
            dataType: 'json',

            success: function(data) {
                $('#table_teacher').html("");
                var i = 1;
                var id;
                console.log(data);

                data.forEach(element => {
                    if (typeof element['fname'] !== 'undefined') {
                        $('#table_teacher').append(`
                        <tr>
                            <td>${i++}</td>
                            <td>${element['fname']}  ${element['lname']} </td>
                            <td>${element['email']}</td>
                            <td>${element['role']}</td>
                            <td>${element['year']}</td>
                            <td>${element['level']} </td>
                            <td>${element['tel']} </td>
                            <td>
                                <button type="modal"  class="btn btn-warning" data-toggle="modal"
                                data-target="#modal-success${element['id']}">
                                <i class="fas fa-pen"></i>
                            </button>
                        </td>

                        <td class="col-md-1">
                            <form action="/UserDashboard/${element['id']}"
                                method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit"  class="btn btn-danger"><i
                                    class="fas fa-trash"></i></button>
                                </form>
                            </td>
                            </tr>`);
                    } else {
                        $('#table_teacher').html("");
                    }
                });

            },
            error: function(e) {
                console.log(e);
            }
        });
    }
</script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
