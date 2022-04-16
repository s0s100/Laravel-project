<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/4245b2264c.js" crossorigin="anonymous"></script>

    <link rel='stylesheet' href="{{ URL::asset('css/mycss.css') }}">
</head>

<body>
    <div class="navbar">
        @if (auth()->user())
            <a href="{{ route('users.show', ['id' => auth()->user()->id]) }}">
                User page
            </a>
        @else
            <a href="{{ URL::to('/') }}/register">
                Register
            </a>
        @endif

        <a href="{{ URL::to('/') }}/users">
            Users
        </a>

        <a href="{{ URL::to('/') }}/comments">
            Comments
        </a>

        @if (auth()->user())
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endif
    </div>
    <div class="main">
        <h1> Create that post!</h1>
    </div>
</body>
