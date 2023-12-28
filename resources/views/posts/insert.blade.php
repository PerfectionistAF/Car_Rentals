<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
</head>
<body>
    <form method="post" action="{{route('posts-store')}}">
        @csrf
        <label for="user_id"> ID</label>
            <input type="number" name="user_id"><br><br>

        <label for="post_title"> Title</label>
            <input type="text" name="post_title"><br><br>
        
        <label for="post_content">Content</label>
            <textarea name="post_content" id="" cols="30" rows="10">
            </textarea><!--<input type="text" name="post_content">--><br><br>
        
        <label for="post_date">Date</label>
        <input type="date" name="post_date"><br><br>


            <input type="submit" value="Add">
    </form>
</body>
</html>