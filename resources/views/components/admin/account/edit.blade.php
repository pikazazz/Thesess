@if (Auth::user()->id = $id)
    @extends('layouts.appAdmin')


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
                            <li class="breadcrumb-item active">แก้ไขข้อมูลส่วนตัว</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    @endsection


    @section('content')
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card card-danger">
                    @php
                        $id = Auth::user()->id;
                    @endphp
                    <div class="card-body">
                        <form action="{{ route('Account.update', $id) }}" method="post">
                            @csrf
                            @method('put')
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <label>ชื่อจริง :</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="fname" value="{{ Auth::user()->fname }}"
                                        data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask=""
                                        inputmode="numeric">
                                </div>
                                <!-- /.input group -->
                            </div>


                            <div class="form-group">
                                <label>นามสกุล :</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="lname" value="{{ Auth::user()->lname }}"
                                        data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask=""
                                        inputmode="numeric">
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
                                    <input type="text" name="address" value="{{ Auth::user()->address }}" class="form-control"
                                        data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']"
                                        data-mask="" inputmode="text">
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
                                    <input type="text" name="tel" value="{{ Auth::user()->tel }}" class="form-control"
                                        data-inputmask="'alias': 'ip'" data-mask="" inputmode="numeric">
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
                                    <input type="email" class="form-control" id="email"
                                       name="email" value="{{ Auth::user()->email }}" placeholder="Enter email">

                                </div>
                                <br>
                            </div>


                            <button type="submit" class="btn btn-success btn-block">บันทึกข้อมูล</button>

                        </form>
                        <!-- /.input group -->

                        <!-- /.form group -->

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-3"></div>
        </div>

    @endsection

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@else
    error
@endif
