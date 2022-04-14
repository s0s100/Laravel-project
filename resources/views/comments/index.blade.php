<!DOCTYPE HTML>
<html>

<head>
    <title>Comments</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/4245b2264c.js" crossorigin="anonymous"></script>

    <link rel='stylesheet' href="{{ URL::asset('css/mycss.css') }}">

    <script src="https://unpkg.com/vue@next"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
        <h1>Comments</h1>
        <div id="comment">
            <ul>
                <li v-for="comment in comments">
                    <b> Text: </b> @{{ comment.text }}
                    <b> Post ID: </b> @{{ comment.post_id }}
                    <b> User ID: </b> @{{ comment.user_id }}
                </li>
            </ul>
            
            @if (auth()->user())
                <h3> New comment </h3>
                <b> Comment text </b>

                <input type="text" id="newCommentText" v-model="newCommentText">

                <br>
                <b> Post Id </b>

                <input type="number" id="postId" v-model="postId">
                {{-- <input type="text" id="userId" v-model="userId" value="{{ auth()->user()->id }}"> --}}
                <button @click="createComment"> Send </button>
            @endif

            <script>
                const Comment = {
                    data() {
                        return {
                            comments: [],
                            newCommentText: "",
                        }
                    },
                    mounted() {
                        axios.get("{{ route('api.comments.index') }}")
                            .then(response => {
                                this.comments = response.data;
                            })
                            .catch(response => {
                                console.log(response);
                            })
                    },
                    methods: {
                        createComment() {
                            axios.post("{{ route('api.comments.store') }}", {
                                    text: this.newCommentText,
                                    post_id: this.postId,
                                    // user_id: this.userId,
                                    user_id: {{auth()->user()->id}}
                                    // post_id: 1,
                                    // user_id: 1,
                                })
                                .then(response => {
                                    this.comments.push(response.data);
                                    this.newCommentText = '';
                                    this.postId = '';
                                })
                                .catch(error => {
                                    console.log(error.response.data);
                                })
                        }
                    }

                }

                Vue.createApp(Comment).mount('#comment');
            </script>
        </div>
</body>

</html>
