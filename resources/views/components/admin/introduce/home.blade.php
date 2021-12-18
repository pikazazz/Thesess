@extends('layouts.appAdmin')


@section('header-content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">เพิ่มหมวดหมู่</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Introduce</li>
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
                <form action="{{ route('Introduce.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ชื่อหมวดหมู่</label>
                            <input type="text" class="form-control" id="category_name" name="category_name" value=""
                                placeholder="ชื่อหมวดหมู่">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="type" value="category" class="btn btn-primary">Submit</button>
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
                <form action="{{ route('Introduce.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="sss">ชื่อเรื่อง</label>
                            <input type="text" class="form-control" id="news_name" name="news_name" value="">
                        </div>

                        <div class="form-group">
                            <label for="sss">หมวดหมู่</label>
                            @php
                                use App\Models\admins\category;

                                $category = category::get();

                            @endphp


                            <select class="form-control" name="category_id" placeholder="ทีปรึกษาร่วม" id="category_id">

                                <option value="" selected="selected">
                                    -- โปรดเลือก --
                                </option>

                                @foreach ($category as $list)
                                    <option value="{{ $list->id }}">{{ $list->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">รายละเอียด</label>
                            <textarea id="summernote" name="news_detail"></textarea>
                        </div>

                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="type" value="news" class="btn btn-primary">Submit</button>
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
                    <h3 class="card-title">หมวดหมู่</h3>

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
                                            <th>ชื่อหมวดหมู่</th>
                                            <th>ผู้สร้าง</th>
                                            <th>วันที่สร้าง</th>
                                            <th></th>
                                            <th>เครื่องมือ</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($category as $Category)

                                            <tr>
                                                <td>{{ $Category->id }}</td>
                                                <td>{{ $Category->category_name }}</td>
                                                <td>{{ $Category->creator }}</td>
                                                <td>{{ $Category->created_at }}</td>
                                                <td>
                                                    <form action="{{ route('UserDashboard.edit', $Category->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('put')
                                                        <button type="submit" class="btn btn-warning"><i
                                                                class="fas fa-pen"></i></button>
                                                    </form>
                                                </td>
                                                <td class="col-md-1">
                                                    <form action="{{ route('UserDashboard.destroy', $Category->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>


                                            </tr>


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

    {{-- <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">อาจารย์</h3>
                    <div class="card-tools">
                        <form action="{{ route('UserDashboard.create') }}" method="POST">
                            @csrf
                            @method('GET')
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="teacher_search" class="form-control float-right"
                                    placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
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
                                            <th></th>
                                            <th>เครื่องมือ</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($teacher as $tea)
                                            @if ($tea->role != 'student')
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $tea->fname }} {{ $tea->lname }}</td>
                                                    <td>{{ $tea->email }}</td>
                                                    <td>{{ $tea->role }}</td>
                                                    <td>{{ $tea->level }}</td>
                                                    <td>
                                                        <form action="{{ route('UserDashboard.edit', $tea->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('put')
                                                            <button type="submit" class="btn btn-warning"><i
                                                                    class="fas fa-pen"></i></button>
                                                        </form>
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

                                                    <td class="col-md-1">
                                                        <form action="{{ route('UserDashboard.show', $tea->id) }}"
                                                            method="GET">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-success"><i
                                                                    class="fas fa-eye"></i></button>
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
    </div> --}}



@endsection




<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
