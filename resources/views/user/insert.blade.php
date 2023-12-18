<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body><!----TASK 8---->
    <form method="post" action="{{route('users-store')}}">
        @csrf
        <label for="name"> Name</label>
            <input type="text" name="name"><br><br>
        
        <label for="email">Email</label>
            <input type="email" name="email"><br><br>
            <input type="submit" value="Add">
    </form>
</body>
</html>