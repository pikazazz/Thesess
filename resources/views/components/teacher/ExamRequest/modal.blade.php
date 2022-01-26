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
                <h5>อนุญาตให้สอบ</h5>
                <div class="form-group">

                    <select name="approve" class="custom-select form-control-border" id="exampleSelectBorder">
                        <option value="1">ให้สอบ</option>
                        <option value="0">ไม่ให้สอบ</option>
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
