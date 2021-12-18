@foreach ($student as $students)
    @if ($students->role == 'student')
        <tr>

            <td>{{ $students->fname }} {{ $students->lname }}</td>
            <td>{{ $students->year }}</td>
            <td></td>
            <td><button type="submit" onclick="setGroups({{ Auth::user()->id }}, {{ $students->id }})"
                    class="btn btn-success">ส่งคำเชิญ</button></td>
            <td></td>
        </tr>
    @endif

@endforeach
@if (sizeof($student)==0)
<tr>

    <td></td>
    <td></td>
    <td></td>
    <td>ไม่พบข้อมูล</td>
    <td></td>
</tr>
<script>
    Swal.fire(
        'แจ้งเตือนจากระบบ',
        'ไม่พบรายการที่ค้นหา',
        'warning'
    )
</script>

@endif
