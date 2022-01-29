<div class="modal fade" id="modal-success{{ $i }}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ยืนยันการทำรายการ {{$std->id}} </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="exampleInputEmail1">ชื่อจริง</label>
                    <input type="text" class="form-control" id="fname" name="fname" value="{{$std->fname}}" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">นามสกุล</label>
                    <input type="text" class="form-control" id="lname" name="lname" value="{{$std->lname}}" required>
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">รหัสนักศึกษา</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{explode('@',$std->email)[0]}}" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">รหัสผ่าน</label>
                    <input type="password" class="form-control" minlength="8" id="password" name="password" value=""
                        required>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">แก้ไข</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
