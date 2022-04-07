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
    <div class="row">
        <div class="col-sm-4">
            <div class="column">
                <div class="row-sm-4 text-center">

                    @if ($user->image_path)
                        <img src="{{ URL::to('/') }}/images/avatars/{{ $user->image_path }}"
                            class="img-circle main-avatar" alt="User pic">
                    @else
                        <img src="{{ URL::to('/') }}/images/default_avatar.jpg" class="img-circle avatar"
                            alt="User pic">
                    @endif
                    <h1>@yield('username')</h1>


                </div>
                <div class="row-sm-4 user-info text-center">
                    <p> @yield('content') </p>
                    <p> Followers: <b> @yield('followers') </b> Following: <b> @yield('following') </b> </p>
                </div>
                <div class="row-sm-4 text-center">
                    <h2> <i class="fa-solid fa-comment"></i> User Comments </h2>
                    @foreach ($user->comments as $comment)
                        <div class="row-sm-2 comment">
                            <i class="fa-solid fa-user"></i>
                            <b> {{ $comment->user->name }} </b>
                            <i class="fa-solid fa-signs-post"></i>
                            <b> {{ $comment->post->user->name }} </b>
                            <br>
                            <small> {{ $comment->text }} </small>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-8" colo>
            <div class="column posts text-center">
                <h1> <i class="fa-solid fa-signs-post"></i> Posts </h1>
                @foreach ($user->posts as $post)
                    <div class="row-sm-4 post">
                        @if ($post->image_path)
                            <img src="{{ URL::to('/') }}/images/posts/{{ $post->image_path }}"
                                class="post_image" alt="Post pic">
                        @endif
                        <i class="fa-solid fa-user"></i>
                        <b>{{ $post->user->name }} </b>
                        <br>
                        <h5 style="margin-bottom: 0px"> {{ $post->name }} </h5>
                        <small> {{ $post->text }} </small>
                        <br>
                        <h3> Comments: </h3>
                        @foreach ($post->comments as $comment)
                            <div class="row-sm-2 comment">
                                <b> Created by: {{ $comment->user->name }} </b>
                                <br>
                                <small> {{ $comment->text }} </small>
                            </div>
                        @endforeach
                        <br>
                        {{-- Here we create an input form --}}
                        <form method="POST" action="{{ route('comment.store') }}">
                            @csrf
                            <p>
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <input type="text" name="text">
                                <input type="submit" value="Send">
                            </p>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
