
@auth
@if (Auth::user()->group != null)
    @if (Auth::user()->role == 'teacher')

        @include('components.public.group.teacher')
    @else
        @include('components.public.group.student')
    @endif
@else
    <script type="text/javascript">
        window.location = "/login";
    </script>
@endif
@endauth

@guest
<script type="text/javascript">
    window.location = "/login";
</script>
@endguest
