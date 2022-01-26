<input type="text" name="year" id="year">
<input type="text" name="name" id="name">
<button type="submit" onclick="onchang()">ค้นหา</button>
<div id="activity" class="activity">

</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function onchang() {
        var lastId = 1; //Set id to 0 so you will get all records on page load.
        var year = document.getElementById('year').value;
        var name = document.getElementById('name').value;
        $.ajax({
            type: 'get',
            url: `{{ route('DashboardPro.show', 1) }}`,
            data: {
                id: lastId,
                year: year,
                name: name
            }, //Add request data
            dataType: 'json',
            success: function(data) {

                $('#activity').html("");
                $('#activity').append(`<h1>${data.year}${data.name}</h1>`);
            },
            error: function() {}
        });
    }
</script>

