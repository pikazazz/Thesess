<div class="modal fade" id="modal-success{{ $i }}">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">ยืนยันการทำรายการ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('AddPoint.store') }}" method="post">
                @csrf
                @method('post')
                <div class="modal-body">
                    <h5>อัพเดทผลการสอบ</h5>
                    <input type="text" name="data" value="{{ $Examgroup }}" hidden>
                    <div class="form-group">
                        <select name="point" class="custom-select form-control-border" id="exampleSelectBorder">
                            <option value="1">ผ่าน</option>
                            <option value="0">ผ่านเงื่อนไข 1</option>
                            <option value="0">ผ่านเงื่อนไข 2</option>
                            <option value="0">ไม่ผ่าน</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">ลงคะแนน</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
