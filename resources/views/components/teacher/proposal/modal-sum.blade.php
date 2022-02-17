<div class="modal fade" id="modal-success1{{ $j }}">
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

                    <input type="text" name="data" value="{{ $Point_tran }}" hidden>
                    <div class="form-group">
                        <select name="summations" class="custom-select form-control-border" id="exampleSelectBorder">
                            <option value="ผ่าน">ผ่าน</option>
                            <option value="ไม่ผ่าน">ไม่ผ่าน</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="submit" name="type" value="type" class="btn btn-primary">ลงคะแนน</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
