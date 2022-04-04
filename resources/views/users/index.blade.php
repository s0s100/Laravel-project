{{-- @extends('layouts.app') 

@section('title', 'users')
@section('content')
    <p>Testing users</p>
    <ul>
        @foreach($users as $user)
    <li>{{$user->name}}</li>
        @endforeach
    </ul>
@endsection --}}

<!doctype html>
<html lang="en">
<head>
    <title> @yield('username')s page </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel='stylesheet' href="{{URL::asset('css/mycss.css')}}">
</head>

<body>
    <p>Testing users</p>
    <ul>
        @foreach($users as $user)
    <li>{{$user->name}}</li>
        @endforeach
    </ul>
</body>
</html>