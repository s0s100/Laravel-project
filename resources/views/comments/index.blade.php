<!DOCTYPE HTML>
<html>

<head>
    <title>Comments</title>
</head>

<body>
    <script src="https://unpkg.com/vue@next"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <h1>Comments</h1>
    <div id="comment">
        <ul>
            <li v-for="comment in comments"> @{{ comment.text }}</li>
        </ul>

        <h3> New comment </h3>
        <b> Comment name: </b>

        <input type="text" id="newCommentText" v-model="newCommentText">
        <button @click="createComment"> Send </button>

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
                                post_id: 1,
                                user_id: 1,
                            })
                            .then(response => {
                                this.comments.push(response.data);
                                this.newCommentText = '';
                            })
                            .catch(error => {
                                console.log(error.response.data);
                            })
                    }
                }

            }

            Vue.createApp(Comment).mount('#comment');
        </script>
</body>

</html>
