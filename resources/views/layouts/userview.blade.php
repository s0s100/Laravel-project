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
    <div class="row">
        <div class="col-sm-4">
            <div class="column">
                <div class="row-sm-4">
                    <h1>@yield('username')</h1>
                    <img src="{{asset('images/test_user_image.jpg')}}" class="img-circle" alt = "User pic">
                </div>
                <div class="row-sm-4" style="background-color:lavender;">
                    <h1> User information: </h1>
                    <div>
                        @yield('content')
                    </div>
                    <a> Followers: @yield('followers') </a>
                    <a> Following: @yield('following') </a> 
                </div>
            </div>
        </div>
        <div class="col-sm-8" colo>
            <h1> Posts </h1>
        </div>
    </div>
</body>
</html>