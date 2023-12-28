<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Post Details</title>
</head>
<body>
    <h1>
        {{$post->post_title}}
    </h1>
    <p>
        {{$post->post_content}}
    </p>

    <a href="{{route('posts')}}"><button style="margin: 10px;"><h2 style="color:red">    BACK TO POSTS</h2></button></a>
</body>
</html>