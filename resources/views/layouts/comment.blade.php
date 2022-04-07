<!doctype html>
<html lang="en">

<head>
    <title> Comment </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/4245b2264c.js" crossorigin="anonymous"></script>

    <link rel='stylesheet' href="{{ URL::asset('css/mycss.css') }}">
</head>

<body>
    <h1>QWEQWEQWEQWE</h1>
    <div class="row-sm-2 comment">
        <i class="fa-solid fa-user"></i>
        <b> {{ $comment->user->name }} </b>
        <i class="fa-solid fa-signs-post"></i>
        <b> {{ $comment->post->user->name }} </b>
        <br>
        <small> {{ $comment->text }} </small>
    </div>
</body>

</html>
