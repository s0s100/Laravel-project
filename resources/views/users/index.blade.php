<!doctype html>
<html lang="en">

<head>
    <title> @yield('username')s page </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/4245b2264c.js" crossorigin="anonymous"></script>

    <link rel='stylesheet' href="{{ URL::asset('css/mycss.css') }}">
</head>

<body>
    <h1 class="text-center"> <i class="fa-solid fa-users"></i> User list</h1>
    <div class="column">
        @foreach ($users as $user)
            <div class="row-sm-4 userview">
                <a href="{{ route('users.show', ['id' => $user->id]) }}" style="text-decoration: none">
                    @if ($user->image_path)
                        <img src="images/avatars/{{ $user->image_path }}" class="img-circle avatar" alt="User pic">
                    @else
                        <img src="images/default_avatar.jpg" class="img-circle avatar" alt="User pic">
                    @endif
                </a>
                <a href="/users/{{ $user->id }}">
                    <b class="user-list"> {{ $user->name }}</b>
                </a>
            </div>
        @endforeach
    </div>
</body>

</html>
