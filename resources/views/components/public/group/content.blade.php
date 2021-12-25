@section('header-content')
    @php
    use App\Models\student\groupModel;

    $group = groupModel::find(Auth::user()->group);

    $std_1 = DB::table('users')->find($group->std_first);
    $std_2 = DB::table('users')->find($group->std_second);

    @endphp


    @if ($group->path_proposal == null && Auth::user()->role == 'student')
        <script>
            Swal.fire(
                'คำเตือน',
                'โปรดอัพโหลด Proposal',
                'warning'
            )
        </script>
    @endif




    @switch(request()->get('messagesok'))
        @case('1')
            <script>
                Swal.fire(
                    'ข้อความจากระบบ',
                    'ลบไฟล์สำเร็จ',
                    'success'
                )
            </script>
        @break
        @case('2')
            <script>
                Swal.fire(
                    'ข้อความจากระบบ',
                    'เพิ่มไฟล์สำเร็จ',
                    'success'
                )
            </script>
        @break
        @case('3')
            <script>
                Swal.fire(
                    'ข้อความจากระบบ',
                    'ประเภทไฟล์ไม่ถูกต้อง ลองใหม่ด้วยไฟล์ PDF ',
                    'error'
                )
            </script>
        @break
        @case('4')
            <script>
                Swal.fire(
                    'ข้อความจากระบบ',
                    'แก้ไขข้อมูลกลุ่มสำเร็จ',
                    'success'
                )
            </script>
        @break
        @default

    @endswitch


    {{-- {{ $group }} --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> ชื่อกลุ่ม </h1>


                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">ขั้นตอนการทำวิทยานิพนธ์</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h5 class="m-0"> {{ $group->group_name }} </h5>

                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')

    <section class="content">

        <!-- Default box -->
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" style="width: 128px;height: 128px;"
                                        src="{{ $std_1->img }}" alt="User profile picture">
                                </div>

                                <h5 class="profile-username text-center">{{ $std_1->fname }} {{ $std_1->lname }}</h5>

                                <p class="text-muted text-center">{favorite}</p>

                                <ul class="list-group list-group-unbordered mb-3">


                                </ul>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                    </div>
                    <div class="col-md">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" style="width: 128px;height: 128px;"
                                        src="{{ $std_2->img }}" alt="User profile picture">
                                </div>

                                <h5 class="profile-username text-center">{{ $std_2->fname }} {{ $std_2->lname }}</h5>

                                <p class="text-muted text-center">{favorite}</p>

                                <ul class="list-group list-group-unbordered mb-3">


                                </ul>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                    </div>

                    @if (isset($group) && $group->teacher != null)
                        @php
                            $teacher = DB::table('users')->find($group->teacher);
                        @endphp
                        <div class="col-md">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            style="width: 128px;height: 128px;" src="{{ $teacher->img }}"
                                            alt="User profile picture">
                                    </div>

                                    <h5 class="profile-username text-center">{{ $teacher->fname }}
                                        {{ $teacher->lname }}
                                    </h5>

                                    <p class="text-muted text-center">{favorite}</p>

                                    <ul class="list-group list-group-unbordered mb-3">


                                    </ul>


                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->


                        </div>
                    @endif

                </div>
            </div>
            <!-- /.col -->

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item "><a class="nav-link active " style="color: rgb(80, 80, 80)"
                                    href="#activity" data-toggle="tab">Activity</a></li>
                            @if (Auth::user()->role=='student')
                            <li class="nav-item"><a class="nav-link" style="color: rgb(80, 80, 80)"
                                href="#settings" data-toggle="tab">Settings</a></li>
                            @endif

                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <div class="post">
                                    <div
                                        class="card card-primary card-outline direct-chat direct-chat-primary collapsed-card">
                                        <div class="card-header">
                                            <h3 class="card-title">กล่องข้อความ</h3>

                                            <div class="card-tools">
                                                <span title="3 New Messages" class="badge bg-primary">3</span>
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" title="Contacts"
                                                    data-widget="chat-pane-toggle">
                                                    <i class="fas fa-comments"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <!-- Conversations are loaded here -->
                                            <div class="direct-chat-messages">
                                                <!-- Message. Default to the left -->
                                                <div class="direct-chat-msg">
                                                    <div class="direct-chat-infos clearfix">
                                                        <span class="direct-chat-name float-left">Alexander Pierce</span>
                                                        <span class="direct-chat-timestamp float-right">23 Jan 2:00
                                                            pm</span>
                                                    </div>
                                                    <!-- /.direct-chat-infos -->
                                                    <img class="direct-chat-img" src="../dist/img/user1-128x128.jpg"
                                                        alt="Message User Image">
                                                    <!-- /.direct-chat-img -->
                                                    <div class="direct-chat-text">
                                                        Is this template really for free? That's unbelievable!
                                                    </div>
                                                    <!-- /.direct-chat-text -->
                                                </div>
                                                <!-- /.direct-chat-msg -->

                                                <!-- Message to the right -->
                                                <div class="direct-chat-msg right">
                                                    <div class="direct-chat-infos clearfix">
                                                        <span class="direct-chat-name float-right">Sarah Bullock</span>
                                                        <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                                    </div>
                                                    <!-- /.direct-chat-infos -->
                                                    <img class="direct-chat-img" src="../dist/img/user328x128.jpg"
                                                        alt="Message User Image">
                                                    <!-- /.direct-chat-img -->
                                                    <div class="direct-chat-text">
                                                        You better believe it!
                                                    </div>
                                                    <!-- /.direct-chat-text -->
                                                </div>
                                                <!-- /.direct-chat-msg -->
                                            </div>
                                            <!--/.direct-chat-messages-->

                                            <!-- Contacts are loaded here -->
                                            <div class="direct-chat-contacts">
                                                <ul class="contacts-list">
                                                    <li>
                                                        <a href="#">
                                                            <img class="contacts-list-img"
                                                                src="../dist/img/user1-128x128.jpg" alt="User Avatar">

                                                            <div class="contacts-list-info">
                                                                <span class="contacts-list-name">
                                                                    Count Dracula
                                                                    <small
                                                                        class="contacts-list-date float-right">2/28/2015</small>
                                                                </span>
                                                                <span class="contacts-list-msg">How have you been? I
                                                                    was...</span>
                                                            </div>
                                                            <!-- /.contacts-list-info -->
                                                        </a>
                                                    </li>
                                                    <!-- End Contact Item -->
                                                </ul>
                                                <!-- /.contatcts-list -->
                                            </div>
                                            <!-- /.direct-chat-pane -->
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <form action="#" method="post">
                                                <div class="input-group">
                                                    <input type="text" name="message" placeholder="Type Message ..."
                                                        class="form-control">
                                                    <span class="input-group-append">
                                                        <button type="submit" class="btn btn-primary">Send</button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.card-footer-->
                                    </div>
                                </div>
                                <!-- /.post -->


                            </div>


                            <div class="tab-pane" id="settings">
                                <form action="{{ route('Group.update', $group->id) }}" method="POST"
                                    class="form-horizontal">
                                    @csrf
                                    @method('put')

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">ชื่อกลุ่ม</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="group_name" value="{{$group->group_name}}" id="group_name"
                                                placeholder="ชื่อกลุ่ม">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">ที่อยู่รูปภาพ (URL)</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{$group->path_img_group}}" class="form-control" name="path_img_group"
                                                id="path_img_group" placeholder="ที่อยู่รูปภาพ (URL)">
                                        </div>
                                    </div>

                                    @php
                                        use App\Models\User;

                                        $colist = User::where('role', '=', 'teacher')->get();

                                    @endphp



                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">ที่ปรึกษาร่วม</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="co1" placeholder="ทีปรึกษาร่วม" id="co1">

                                                @if ($group->co_teacher != null)
                                                <option value="{{($group->co_teacher)}}" selected="selected">
                                                    {{$colist[$group->co_teacher-1]->fname}} {{$colist[$group->co_teacher-1]->lname}}
                                                </option>
                                                @else
                                                <option value="" selected="selected">
                                                    -- โปรดเลือก อาจารย์ --
                                                </option>
                                                @endif
                                                <option value="">
                                                    -- ไม่เลือก --
                                                </option>
                                                @foreach ($colist as $list)
                                                    <option value="{{ $list->id }}">{{ $list->fname }}
                                                        {{ $list->lname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">ที่ปรึกษาร่วม</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="co2" placeholder="ทีปรึกษาร่วม" id="co1">

                                                @if ($group->co_teacher_2 != null)
                                                <option value="{{($group->co_teacher_2)}}" selected="selected">
                                                    {{$colist[$group->co_teacher_2-1]->fname}} {{$colist[$group->co_teacher_2-1]->lname}}
                                                </option>
                                                @else
                                                <option value="" selected="selected">
                                                    -- โปรดเลือก อาจารย์ --
                                                </option>
                                                @endif
                                                <option value="">
                                                    -- ไม่เลือก --
                                                </option>
                                                @foreach ($colist as $list)
                                                    <option value="{{ $list->id }}">{{ $list->fname }}
                                                        {{ $list->lname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">ที่ปรึกษาร่วม</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="co3" placeholder="ทีปรึกษาร่วม" id="co1">

                                                @if ($group->co_teacher_3 != null)
                                                <option value="{{($group->co_teacher_3)}}" selected="selected">
                                                    {{$colist[$group->co_teacher_3-1]->fname}} {{$colist[$group->co_teacher_3-1]->lname}}
                                                </option>
                                                @else
                                                <option value="" selected="selected">
                                                    -- โปรดเลือก อาจารย์ --
                                                </option>
                                                @endif
                                                <option value="">
                                                    -- ไม่เลือก --
                                                </option>
                                                @foreach ($colist as $list)
                                                    <option value="{{ $list->id }}">{{ $list->fname }}
                                                        {{ $list->lname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-success">อัพเดท</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
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

                            <th style="width: 8%" class="text-center">
                                ผลสอบ
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                    </thead>
                    @include('components.public.group.modals')
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

                            <td class="project-state">
                                <span class="badge badge-success">Pass</span>
                            </td>
                            @php
                                $ex = groupModel::find(Auth::user()->group);

                            @endphp
                            @if ($ex->path_proposal == null)
                                <td class="project-actions text-right">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#proposal">
                                        <i class="far fa-eye"></i>
                                        Upload
                                    </button>
                                    </a>
                                </td>
                            @elseif ($ex->path_proposal!=null)
                                <form action="{{ route('FileUpload.destroy', Auth::user()->group) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <td class="project-actions text-right">
                                        <button class="btn btn-danger btn-sm" name="typedel" value="proposal"
                                            type="submit">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </button>
                                        </a>
                                    </td>
                                </form>
                            @endif

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

                            <td class="project-state">
                                <span class="badge badge-success">Pass</span>
                            </td>
                            @php
                                $ex = groupModel::find(Auth::user()->group);

                            @endphp
                            @if ($ex->path_ch1 == null)
                                <td class="project-actions text-right">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ch1">
                                        <i class="far fa-eye"></i>
                                        Upload
                                    </button>
                                    </a>
                                </td>
                            @elseif ($ex->path_ch1!=null)
                                <form action="{{ route('FileUpload.destroy', Auth::user()->group) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <td class="project-actions text-right">
                                        <button class="btn btn-danger btn-sm" name="typedel" value="ch1" type="submit">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </button>
                                        </a>
                                    </td>
                                </form>
                            @endif

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

                            <td class="project-state">
                                <span class="badge badge-success">Pass</span>
                            </td>
                            @php
                                $ex = groupModel::find(Auth::user()->group);

                            @endphp
                            @if ($ex->path_ch2 == null)
                                <td class="project-actions text-right">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ch2">
                                        <i class="far fa-eye"></i>
                                        Upload
                                    </button>
                                    </a>
                                </td>
                            @elseif ($ex->path_ch2!=null)
                                <form action="{{ route('FileUpload.destroy', Auth::user()->group) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <td class="project-actions text-right">
                                        <button class="btn btn-danger btn-sm" name="typedel" value="ch2" type="submit">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </button>
                                        </a>
                                    </td>
                                </form>
                            @endif

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

                            <td class="project-state">
                                <span class="badge badge-success">Not Pass</span>
                            </td>
                            @php
                                $ex = groupModel::find(Auth::user()->group);

                            @endphp
                            @if ($ex->path_ch3 == null)
                                <td class="project-actions text-right">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ch3">
                                        <i class="far fa-eye"></i>
                                        Upload
                                    </button>
                                    </a>
                                </td>
                            @elseif ($ex->path_ch3!=null)
                                <form action="{{ route('FileUpload.destroy', Auth::user()->group) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <td class="project-actions text-right">
                                        <button class="btn btn-danger btn-sm" name="typedel" value="ch3" type="submit">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </button>
                                        </a>
                                    </td>
                                </form>
                            @endif
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
                                    ผลและการวิเคราะห์ผลการดำเนินงาน
                                </small>
                            </td>
                            <td>
                                <ul class="list-inline">

                                </ul>
                            </td>

                            <td class="project-state">
                                <span class="badge badge-success">Not Pass</span>
                            </td>
                            @php
                                $ex = groupModel::find(Auth::user()->group);

                            @endphp
                            @if ($ex->path_ch4 == null)
                                <td class="project-actions text-right">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ch4">
                                        <i class="far fa-eye"></i>
                                        Upload
                                    </button>
                                    </a>
                                </td>
                            @elseif ($ex->path_ch4!=null)
                                <form action="{{ route('FileUpload.destroy', Auth::user()->group) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <td class="project-actions text-right">
                                        <button class="btn btn-danger btn-sm" name="typedel" value="ch4" type="submit">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </button>
                                        </a>
                                    </td>
                                </form>
                            @endif
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

                            <td class="project-state">
                                <span class="badge badge-success">Not Pass</span>
                            </td>
                            @php
                                $ex = groupModel::find(Auth::user()->group);

                            @endphp
                            @if ($ex->path_ch5 == null)
                                <td class="project-actions text-right">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ch5">
                                        <i class="far fa-eye"></i>
                                        Upload
                                    </button>
                                    </a>
                                </td>
                            @elseif ($ex->path_ch5!=null)
                                <form action="{{ route('FileUpload.destroy', Auth::user()->group) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <td class="project-actions text-right">
                                        <button class="btn btn-danger btn-sm" name="typedel" value="ch5" type="submit">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </button>
                                        </a>
                                    </td>
                                </form>
                            @endif
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
