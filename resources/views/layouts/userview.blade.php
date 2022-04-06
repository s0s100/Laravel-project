<!doctype html>
<html lang="en">

<head>
    <title> @yield('username')s page </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel='stylesheet' href="{{ URL::asset('css/mycss.css') }}">
</head>

<body>
    <div class="row">
        <div class="col-sm-4">
            <div class="column">
                <div class="row-sm-4">
                    <h1>@yield('username')</h1>
                    <img src="{{ asset('images/test_user_image.jpg') }}" class="img-circle" alt="User pic">
                </div>
                <div class="row-sm-4 user-info">
                    <h2> User information: </h2>
                    <div>
                        @yield('content')
                    </div>
                    <a> Followers: @yield('followers') </a>
                    <a> Following: @yield('following') </a>
                </div>
                <div class="row-sm-4 comment-info">
                    <h2> Comments: </h2>
                    @foreach ($user->comments as $comment)
                        <div class="row-sm-2 comment">
                            <b> Created by: {{ $comment->user->name }} </b>
                            <br>
                            <b> Under the post of: {{$comment->post->user->name}} </b>
                            <br>
                            <small> {{ $comment->text }} </small>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-8" colo>
            <div class="column posts">
                <h1> Posts: </h1>
                @foreach ($user->posts as $post)
                    <div class="row-sm-4 post">
                        <b> Created by: {{ $post->user->name }} </b>
                        <br>
                        <b> {{$post->name}} </b>
                        <br>
                        <small> {{ $post->text }} </small>
                        <br>
                        <i> Comments: </i>
                        @foreach ($post->comments as $comment)
                            <div class="row-sm-2 comment">
                                <b> Created by: {{ $comment->user->name }} </b>
                                <br>
                                <small> {{ $comment->text }} </small>
                            </div>
                        @endforeach
                        <br>
                        {{-- Here we create an input form --}}
                        <form method="POST" action="{{route('comment.store')}}">
                            @csrf
                            <p>
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <input type="text" name="text">
                                <input type="submit" value="Send">
                            </p>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <a href="{{route('users.index')}}">Back</a>
</body>

</html>
