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
        <div class="col-sm-4 affix sticky-top">
            <div class="column">
                <div class="row-sm-4 text-center">
                    @if ($user->image_path)
                        <img src="{{ URL::to('/') }}/images/avatars/{{ $user->image_path }}"
                            class="img-circle main-avatar" alt="User pic">
                    @else
                        <img src="{{ URL::to('/') }}/images/default_avatar.jpg" class="img-circle main-avatar"
                            alt="User pic">
                    @endif
                    <h1>@yield('username')</h1>


                </div>
                <div class="row-sm-4 user-info text-center">
                    <p> @yield('content') </p>
                    <p>
                        <a href="{{ route('users.followers', ['id' => $user->id]) }}">
                            Followers
                        </a>
                        <b>
                            @yield('followers')
                        </b>
                        <a href="{{ route('users.following', ['id' => $user->id]) }}">
                            Following
                        </a>
                        <b>
                            @yield('following')
                        </b>
                    </p>
                </div>
                <div class="row-sm-4 text-center">
                    <h3>
                        <i class="fa-solid fa-comment"></i>
                        User Comments
                    </h3>
                    @foreach ($user->comments as $comment)
                        <div class="row-sm-2 comment">
                            <small> {{ $comment->text }} </small>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-8 scrollit pull-right" colo>
            <div class="column">
                <h3 class=" text-center">
                    <i class="fa-solid fa-signs-post"></i>
                    User Posts
                </h3>

                @foreach ($user->posts as $post)
                    <div class="row-sm-4 post">
                        <div class="row-sm-4 postbox">
                            <div class="column">
                                <div class="row-sm-7">
                                    @if ($post->image_path)
                                        <img src="{{ URL::to('/') }}/images/posts/{{ $post->image_path }}"
                                            class="post_image pull-left" alt="Post pic">
                                    @endif
                                    <h3 class="postname">
                                        {{ $post->name }}
                                    </h3>
                                    <small class="pull-left">
                                        {{ $post->text }}
                                    </small>
                                </div>
                                <div class="row-sm-1 pull-right pull-bottom">
                                    <p class="username">
                                        @if ($post->user->image_path)
                                            <img src="{{ URL::to('/') }}/images/avatars/{{ $user->image_path }}"
                                                class="img-circle small-avatar" alt="User pic">
                                        @else
                                            <img src="{{ URL::to('/') }}/images/default_avatar.jpg"
                                                class="img-circle small-avatar" alt="User pic">
                                        @endif

                                        {{ $post->user->name }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        @foreach ($post->comments as $comment)
                            <div class="row-sm-2 comment">
                                <h5 class="username"> {{ $comment->user->name }} </h5>

                                {{-- Here we delete the comment --}}
                                @if ((auth()->user()->id == $comment->user->id) 
                                    || auth()->user()->id == $post->user_id)
                                    <form class="pull-right pull-bottom" method="POST"
                                        action=" {{ route('comment.destroy', [$comment->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="delete-button" type="submit">&#10006;</button>
                                    </form>
                                @endif

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
                                <input type="submit" value="Comment">
                            </p>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
