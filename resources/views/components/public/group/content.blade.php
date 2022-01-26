@section('header-content')
    @php
    use App\Models\student\groupModel;
    use App\Models\publics\messagelogs;
    use App\Models\student\myaccountmodel;

    $group = groupModel::find(Auth::user()->group);

    $idGroup = intval($group->id);
    $message = messagelogs::get()->where('group', '==', $idGroup);

    $std_1 = DB::table('users')->find($group->std_first);
    $std_2 = DB::table('users')->find($group->std_second);

    @endphp


    <script>
        function showcase() {
            Swal.fire(
                'คำเตือน',
                'ออกจากกลุ่มสำเร็จ',
                'error'
            )
        }
    </script>

    @if ($group->path_proposal == null && Auth::user()->role == 'student')
        <script>
            Swal.fire(
                'คำเตือน',
                'โปรดอัพโหลด Proposal',
                'warning'
            )
        </script>
    @endif

    @if (\Session::has('messagesok'))

        <script>
            Swal.fire(
                'Success',
                '{!! \Session::get('messagesok') !!}',
                '{!! \Session::get('messagetype') !!}',
            )
        </script>
    @endif


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


@php
use App\Models\publics\group;

$findPermission = group::where('std_first', '=', Auth::user()->id)->orWhere('std_second', '=', Auth::user()->id)->orWhere('teacher', '=', Auth::user()->id)->get();

dd($findPermission);
@endphp

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
                    <div class="col-md">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">

                                <ul class="list-group list-group-unbordered mb-3">

                                    @if (Auth::user()->role == 'teacher')
                                        <button type="submit" onclick="showcase()"
                                            class="btn btn-danger">ฉันต้องการหนีนักศึกษากลุ่มนี้</button>
                                    @else
                                        <button type="submit" onclick="showcase()"
                                            class="btn btn-danger">ปุ่มลาออกจากกลุ่มโครงงาน</button>
                                    @endif

                                </ul>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                    </div>
                </div>
            </div>
            <!-- /.col -->

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item "><a class="nav-link active " style="color: rgb(80, 80, 80)"
                                    href="#activity" data-toggle="tab">Activity</a></li>
                            @if (Auth::user()->role == 'student')
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
                                    <div class="card card-primary card-outline direct-chat direct-chat-primary ">
                                        <div class="card-header">
                                            <h3 class="card-title">กล่องข้อความ</h3>

                                            <div class="card-tools">
                                                {{-- <span title="3 New Messages" class="badge bg-primary">3</span> --}}
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->

                                        <div class="card-body">
                                            <!-- Conversations are loaded here -->
                                            <div class="direct-chat-messages">

                                                @foreach ($message as $Message)
                                                    @if ($Message->sender == Auth::user()->id)

                                                        <div class="direct-chat-msg right">
                                                            <div class="direct-chat-infos clearfix">
                                                                <span class="direct-chat-name float-right">ฉันเอง</span>
                                                                <span
                                                                    class="direct-chat-timestamp float-left">{{ $Message->created_at }}</span>
                                                            </div>
                                                            <!-- /.direct-chat-infos -->
                                                            <img class="direct-chat-img" src="{{ Auth::user()->img }}"
                                                                alt="Message User Image">
                                                            <!-- /.direct-chat-img -->
                                                            <div class="direct-chat-text">
                                                                {!! $Message->massage !!}
                                                            </div>
                                                            <!-- /.direct-chat-text -->
                                                        </div>

                                                    @else
                                                        @if ($Message->sender)
                                                            @php
                                                                $senderData = myaccountmodel::find($Message->sender);
                                                            @endphp
                                                            <div class="direct-chat-msg">
                                                                <div class="direct-chat-infos clearfix">
                                                                    <span class="direct-chat-name float-left">
                                                                        {{ $senderData->fname }}</span>
                                                                    <span class="direct-chat-timestamp float-right">
                                                                        {{ $Message->created_at }}</span>
                                                                </div>
                                                                <!-- /.direct-chat-infos -->
                                                                <img class="direct-chat-img" src="{{ $senderData->img }}"
                                                                    alt="Message User Image">
                                                                <!-- /.direct-chat-img -->
                                                                <div class="direct-chat-text">
                                                                    {!! $Message->massage !!}
                                                                </div>
                                                                <!-- /.direct-chat-text -->
                                                            </div>

                                                        @endif


                                                    @endif
                                                @endforeach



                                            </div>
                                            <!--/.direct-chat-messages-->


                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            {{-- action="{{route('Message.store')}}" method="post" --}}
                                            {{-- @csrf
                                                @method('post') --}}
                                            <div class="chat-section">
                                                <div class="chat-box">
                                                    <div class="form-control" id="chatInput" contenteditable="">

                                                    </div>
                                                </div>
                                            </div>


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
                                            <input type="text" class="form-control" name="group_name"
                                                value="{{ $group->group_name }}" id="group_name" placeholder="ชื่อกลุ่ม">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">ที่อยู่รูปภาพ (URL)</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $group->path_img_group }}"
                                                class="form-control" name="path_img_group" id="path_img_group"
                                                placeholder="ที่อยู่รูปภาพ (URL)">
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
                                                    <option value="{{ $group->co_teacher }}" selected="selected">
                                                        {{ $colist[$group->co_teacher - 1]->fname }}
                                                        {{ $colist[$group->co_teacher - 1]->lname }}
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
                                                    <option value="{{ $group->co_teacher_2 }}" selected="selected">
                                                        {{ $colist[$group->co_teacher_2 - 1]->fname }}
                                                        {{ $colist[$group->co_teacher_2 - 1]->lname }}
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
                                                    <option value="{{ $group->co_teacher_3 }}" selected="selected">
                                                        {{ $colist[$group->co_teacher_3 - 1]->fname }}
                                                        {{ $colist[$group->co_teacher_3 - 1]->lname }}
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
                            <th style="width: 6%">
                                คำแนะนำ
                            </th>

                            <th style="width: 6%" class="text-center">
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



                            @if (Auth::user()->role == 'student')
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
                                @elseif ($ex->path_proposal != null)
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
                            @else
                                <td class="project-actions text-right">
                                    @if ($group->path_proposal != '')
                                        <a href="{{ asset($group->path_proposal) }}" class="btn btn-primary btn-sm">
                                            <i class="far fa-eye"></i>
                                            View
                                        </a>
                                    @endif

                                </td>
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

                            @if (Auth::user()->role == 'student')
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
                                @elseif ($ex->path_ch1 != null)
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

                            @else
                                <td class="project-actions text-right">
                                    @if ($group->path_ch1 != '')
                                        <a href="{{ asset($group->path_ch1) }}" class="btn btn-primary btn-sm">
                                            <i class="far fa-eye"></i>
                                            View
                                        </a>
                                    @endif
                                </td>
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

                            @if (Auth::user()->role == 'student')

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
                                @elseif ($ex->path_ch2 != null)
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
                            @else
                                <td class="project-actions text-right">
                                    @if ($group->path_ch2 != '')
                                        <a href="{{ asset($group->path_ch2) }}" class="btn btn-primary btn-sm">
                                            <i class="far fa-eye"></i>
                                            View
                                        </a>
                                    @endif
                                </td>
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

                            @if (Auth::user()->role == 'student')

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
                                @elseif ($ex->path_ch3 != null)
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

                            @else
                                <td class="project-actions text-right">
                                    @if ($group->path_ch3 != '')
                                        <a href="{{ asset($group->path_ch3) }}" class="btn btn-primary btn-sm">
                                            <i class="far fa-eye"></i>
                                            View
                                        </a>
                                    @endif
                                </td>
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

                            @if (Auth::user()->role == 'student')
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
                                @elseif ($ex->path_ch4 != null)
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
                            @else
                                <td class="project-actions text-right">
                                    @if ($group->path_ch4 != '')
                                        <a href="{{ asset($group->path_ch4) }}" class="btn btn-primary btn-sm">
                                            <i class="far fa-eye"></i>
                                            View
                                        </a>
                                    @endif

                                </td>
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


                            @if (Auth::user()->role == 'student')

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
                                @elseif ($ex->path_ch5 != null)
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
                            @else
                                <td class="project-actions text-right">
                                    @if ($group->path_ch5 != '')
                                        <a href="{{ asset($group->path_ch5) }}" class="btn btn-primary btn-sm">
                                            <i class="far fa-eye"></i>
                                            View
                                        </a>
                                    @endif

                                </td>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.socket.io/4.4.0/socket.io.min.js"
        integrity="sha384-1fOn6VtTq3PWwfsOrk45LnYcGosJwzMHv+Xh/Jx5303FVOXzEnw0EpLv30mtjmlj" crossorigin="anonymous">
    </script>
    <script>
        $(function() {
            let ip_address = '127.0.0.1';
            let socket_port = '3000';
            let socket = io(ip_address + ':' + socket_port);

            let chatInput = $('#chatInput');

            chatInput.keypress(function(e) {
                let message = $(this).html();
                // console.log(message)
                if (e.which === 13 && !e.shiftKey) {
                    chanel = '{{ Auth::user()->group }}';
                    sender_id = '{{ Auth::user()->id }}';
                    sender = '{{ Auth::user()->fname }}';
                    sender_img = '{{ Auth::user()->img }}';

                    socket.emit('sendChatToServer', ({
                        chanel,
                        sender_id,
                        sender,
                        message,
                        sender_img
                    }));
                    $('.direct-chat-messages').append(` <div class="direct-chat-msg right">
                                                    <div class="direct-chat-infos clearfix">
                                                        <span class="direct-chat-name float-right">ฉันเอง</span>
                                                        <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                                    </div>
                                                    <!-- /.direct-chat-infos -->
                                                    <img class="direct-chat-img" src="{{ Auth::user()->img }}"
                                                        alt="Message User Image">
                                                    <!-- /.direct-chat-img -->
                                                    <div class="direct-chat-text">
                                                        ${message}
                                                    </div>
                                                    <!-- /.direct-chat-text -->
                                                </div>`);
                    chatInput.html('');
                    onNoti();
                    return false;
                }
            });

            socket.on('sendChatToClient', ({
                chanel,
                sender_id,
                sender,
                message,
                sender_img
            }) => {

                if (chanel == '{{ $group->id }}') {
                    $('.direct-chat-messages').append(` <div class="direct-chat-msg">
                                                    <div class="direct-chat-infos clearfix">
                                                        <span class="direct-chat-name float-left">${sender}</span>
                                                        <span class="direct-chat-timestamp float-right">23 Jan 2:00
                                                            pm</span>
                                                    </div>
                                                    <!-- /.direct-chat-infos -->
                                                    <img class="direct-chat-img" src="${sender_img}"
                                                        alt="Message User Image">
                                                    <!-- /.direct-chat-img -->
                                                    <div class="direct-chat-text">
                                                        ${message}
                                                    </div>
                                                    <!-- /.direct-chat-text -->
                                                </div>`);
                    onNoti()

                } else {
                    console.log('worng chanel');
                }
            });
        });
    </script>

    <script>
        function onNoti() {
            $(document).ready(function() {
                $("html, .direct-chat-messages").animate({
                    scrollTop: $('.direct-chat-messages').get(0).scrollHeight
                }, 2000);

            });
        }
    </script>
@endsection

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
