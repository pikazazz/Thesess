<form action="{{route('JoinGroup.store')}}" method="post">
    @csrf
    @method('post')
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
                    <input type="text" name="data" value="{{$Group}}" hidden>
                    <p>คุณต้องการยืนยันการส่งคำเชิญไปยังกลุ่มนี้หรือไม่ {{$i}}</p>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">ใช่</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</form>
