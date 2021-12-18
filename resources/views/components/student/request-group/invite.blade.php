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

            $invite = DB::table('request_group')
                ->where('std_receiver', '=', Auth::user()->id)
                ->get();

        @endphp


        <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>หมายเลขคำขอ</th>
                        <th>ผู้ส่ง</th>
                        <th>วันที่ส่ง</th>
                        <th>สถานะคำขอ</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invite as $Invites)
                    <form action="{{route('RequestGroup.update',$Invites->id)}}" method="POST">
                        @csrf
                        @method('put')
                            <tr>
                                <td>{{ $Invites->id }}</td>
                                @php
                                    $sender = DB::table('users')->find($Invites->std_sender);
                                @endphp
                                <td>{{ $sender->fname }} {{ $sender->lname }}</td>
                                <td>{{ $Invites->created_at }}</td>
                                <td>{{ $Invites->status }}</td>
                                @if ($Invites->status == 'waiting' )
                                    <td>
                                        <button type="submit" class="btn btn-success" name="appove" id="appove"
                                            value="appove">รับ</button>
                                        <button type="submit" class="btn btn-danger" name="reject" id="reject"
                                            value="reject">ไม่รับ</button>
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
