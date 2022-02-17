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
                        <input type="text" id="text" class="form-control form-control-lg" onkeyup="findname()"
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
        <h3 class="card-title">รายชื่อนักศึกษา</h3>
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
                    <th>#</th>
                    <th style="width: 20%">ชื่อ - สกุล</th>
                    <th style="width: 80%">กลุ่ม</th>
                    <th style="width: 40%">เบอร์ติดต่อ</th>
                </tr>
            </thead>
            <tbody id="data_table">
                @php
                    static $nums = 1;
                @endphp

                @foreach ($list_std as $List_std)
                    <tr>
                        <td>{{ $nums++ }}</td>
                        <td>{{ $List_std['name'] }}</td>
                        <td>{{ $List_std['group_name'] }}</td>
                        <td>{{ $List_std['tel'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

</div>
