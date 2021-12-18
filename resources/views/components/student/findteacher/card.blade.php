<form action="{{ route('FindTeacher.update', $Teacher->id) }}" method="post">
    @csrf
    @method('put')
<div class="modal fade" id="modal-default{{ $Teacher->id }}">


        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ยืนยันการส่งคำขอไปยัง
                    {{ $Teacher->fname }} {{ $Teacher->lname }}
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="group" name="group" value="{{Auth::user()->group}}" class="btn btn-success">ยืนยัน</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>

    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</form>
