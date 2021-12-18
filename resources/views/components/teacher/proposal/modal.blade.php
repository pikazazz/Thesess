<div class="modal fade" id="modal-success{{ $i }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ยืนยันการทำรายการ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>อัพเดทผลการสอบ</h5>
                <div class="form-group">

                    <select class="custom-select form-control-border" id="exampleSelectBorder">
                        <option>ผ่าน</option>
                        <option>ผ่านเงื่อนไข 1</option>
                        <option>ผ่านเงื่อนไข 2</option>
                        <option>ไม่ผ่าน</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
