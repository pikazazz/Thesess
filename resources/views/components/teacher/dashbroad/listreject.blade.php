<div class="card">
    <div class="card-header">
        <h3 class="card-title">ค้นหา</h3>
    </div>
    <!-- /.card-header -->
    <div class="row">
        <div class="col">
            <div class="card-body p-0 m-3">
                <div class="form-group">
                    <div class="c input-group input-group-lg">
                        <input type="text" id="text" class="form-control form-control-lg" onkeyup="find('warning')"
                            placeholder="ค้นหาด้วยข้อความ (Free Text)">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- /.card-body -->

</div>
<div class="card">

    <div class="card-header">
        <h3 class="card-title">รายชื่อกลุ่ม</h3>
        <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">


            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 100px">#</th>
                    <th>ชื่อโครงงาน</th>
                    <th style="width: 100px">สรุปผล</th>
                    <th style="width: 100px">สถานะ</th>
                </tr>
            </thead>
            <tbody id="data_table">
                @php
                    static $nums = 1;
                @endphp
                @foreach ($groupWait->unique('group_name') as $Group)
                    <tr>
                        <td>{{ $nums++ }}</td>
                        <td> {{ $Group->group_name }}</td>
                        <td> {!! checkstatus($Group->status) !!}</td>
                        <td>{!! checkper($Group->id) !!}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

</div>
