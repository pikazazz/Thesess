@auth
    @if (Auth::user()->role == 'student')
        @if (Auth::user()->group == null)
            <script type="text/javascript">
                window.location = "/FindGroup";
            </script>
        @else
            <script type="text/javascript">
                window.location = "/Group";
            </script>
        @endif

    @elseif (Auth::user()->role=='teacher')

        <script type="text/javascript">
            window.location = "/Dashboard";
        </script>

    @elseif (Auth::user()->role=='admin')

    <script type="text/javascript">
        window.location = "/UserDashboard";
    </script>

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
