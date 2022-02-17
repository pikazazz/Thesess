<div class="col-12">
    <div class="card">
        <div class="card-header">


            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">


                </div>
            </div>
        </div>
        <!-- /.card-header -->
        @php
            use Illuminate\Support\Facades\DB;

            $users = Auth::id();

            $request = DB::table('request_teacher')
                ->where('request_sender', '=', Auth::user()->id)
                ->get();

        @endphp

        <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>หมายเลขคำขอ</th>
                        <th>ผู้รับ</th>
                        <th>วันที่ส่ง</th>
                        <th>สถานะคำขอ</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($request as $Request)
                    <form action="{{route('Request_Group_Theacher.update',$Request->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <tr>
                        <td>{{ $Request->id }}</td>
                        @php
                            $receiver = DB::table('users')->find($Request->request_receiver);
                        @endphp
                        <td>{{ $receiver->fname }} {{ $receiver->lname }}</td>
                        <td>{{ $Request->created_at }}</td>
                        <td>{{ $Request->status }}</td>
                        @if($Request->status!="cancel"&&$Request->status!="success")
                        <td>
                            <button class="btn btn-danger">ยกเลิก</button>
                        </td>
                        @endif
                    </tr>
                    </form>
                    @endforeach


                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
