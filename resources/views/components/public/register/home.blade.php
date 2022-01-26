
@auth
    @if (Auth::user()->role == 'teacher')

        @include('components.public.register.teacher')
    @else
        @include('components.public.register.student')
    @endif

@endauth

@guest
    <script type="text/javascript">
        window.location = "/login";
    </script>
@endguest
