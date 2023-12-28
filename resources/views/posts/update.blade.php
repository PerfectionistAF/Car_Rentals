<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Customer</title>
</head>
<body><!----TASK 8---->
    <form method="post" action="{{ route('posts-update', [$posts -> id]) }}"> 
        @csrf
        <label for="user_id"> ID</label>
            <input type="number" name="user_id" value="{{$posts->user_id}}"><br><br>

        <label for="post_title"> Title</label>
            <input type="text" name="post_title" value="{{$posts->post_title}}"><br><br>
        
        <label for="post_content">Content</label>
            <textarea name="post_content" id="" cols="30" rows="10" value="{{$posts->post_content}}"><br><br>
            </textarea>
            <!--<input type="text" name="post_content" value="{{$posts->post_content}}"><br><br>-->
            <!---names of fields in table-->
        
        <label for="post_date">Date</label>
            <input type="date" name="post_date" value="{{$posts->post_date}}"><br><br>
        
            <input type="submit" value="Update">
    </form>
</body>
</html>