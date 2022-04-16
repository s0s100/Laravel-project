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
    <div class="row main">
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

                {{-- Follow functionality --}}

                <div class="row-sm-4 text-center">
                    @if (auth()->user())
                        @if (auth()->user()->id != $user->id)
                            @if (!auth()->user()->following->contains($user))
                                <form action=" {{ route('friend.store') }}" method="POST">
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    @csrf
                                    <button class="user-button" type="submit">
                                        <h2> Follow </h2>
                                    </button>
                                </form>
                                {{-- <input type="button" onclick="follow()" value="Unfollow" id="followButton"> --}}
                            @else
                                <form method="POST" action=" {{ route('friend.destroy', [$user->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="user-button" type="submit">
                                        <h2> Unfollow </h2>
                                    </button>
                                </form>
                                {{-- <input type="button" onclick="follow()" value="Follow" id="followButton"> --}}
                            @endif
                        @endif
                    @endif

                    <div class="row-sm-4 text-center">
                        @if (auth()->user())
                            @if (auth()->user()->id == $user->id)
                                <form action="{{ route('avatar.upload') }}" enctype="multipart/form-data"
                                    id="modal_form_id" method="POST">
                                    @csrf

                                    <input type="file" name="image" placeholder="Choose image" id="image">
                                    <br>
                                    <button class="user-button" type="submit">
                                        <h2> Upload new avatar </h2>
                                    </button>
                                </form>
                            @endif
                        @endif
                    </div>

                    <div class="row-sm-4 text-center">
                        @if (auth()->user())
                            @if (auth()->user()->id == $user->id)
                                <a href="{{ route('posts.create.post') }}">
                                    <h2> Create post </h2>
                                </a>
                            @endif
                        @endif
                    </div>
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

                            {{-- Post deletion --}}
                            @if (auth()->user())
                                @if (auth()->user()->id == $post->user_id)
                                    <form class="pull-right pull-top" method="POST"
                                        action=" {{ route('post.destroy', [$post->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="delete-button" type="submit">&#10006;</button>
                                    </form>
                                @endif
                            @endif

                            {{-- Update post --}}
                            @if (auth()->user())
                                @if (auth()->user()->id == $post->user_id)
                                    <button class="edit-button" onclick="openForm2({{ $post->id }})">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>

                                    <div class="form-popup" id="myForm2{{ $post->id }}">
                                        <form action=" {{ route('post.update', [$post->id]) }}"
                                            enctype="multipart/form-data"  method="POST">
                                            @csrf
                                            <input type="text" name="name" required>
                                            <input type="text" name="text" required>
                                            <input type="file" name="image" placeholder="Choose image" id="image">
                                            <button type="submit">
                                                Update
                                            </button>
                                            <button type="button" onclick="closeForm2({{ $post->id }})">
                                                Cancel editing
                                            </button>
                                        </form>
                                    </div>

                                    <script>
                                        function openForm2(id) {
                                            document.getElementById("myForm2" + id).style.display = "block";
                                        }

                                        function closeForm2(id) {
                                            document.getElementById("myForm2" + id).style.display = "none";
                                        }
                                    </script>
                                @endif
                            @endif

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

                                {{-- Update comment --}}
                                @if (auth()->user())
                                    @if (auth()->user()->id == $comment->user->id)
                                        <button class="edit-button" onclick="openForm({{ $comment->id }})">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>

                                        <div class="form-popup" id="myForm{{ $comment->id }}">
                                            <form action=" {{ route('comment.edit', [$comment->id]) }}">
                                                <input type="text" name="text" required>
                                                <button type="submit">
                                                    Update
                                                </button>
                                                <button type="button" onclick="closeForm({{ $comment->id }})">
                                                    Cancel editing
                                                </button>
                                            </form>
                                        </div>

                                        <script>
                                            function openForm(id) {
                                                document.getElementById("myForm" + id).style.display = "block";
                                            }

                                            function closeForm(id) {
                                                document.getElementById("myForm" + id).style.display = "none";
                                            }
                                        </script>
                                    @endif
                                @endif

                                {{-- Here we delete the comment --}}
                                @if (auth()->user())
                                    @if (auth()->user()->id == $comment->user->id || auth()->user()->id == $post->user_id)
                                        <form class="pull-right pull-bottom" method="POST"
                                            action=" {{ route('comment.destroy', [$comment->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="delete-button" type="submit">&#10006;</button>
                                        </form>
                                    @endif
                                @endif

                                {{-- Comment content --}}
                                <small> {{ $comment->text }} </small>

                            </div>
                        @endforeach
                        <br>
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
