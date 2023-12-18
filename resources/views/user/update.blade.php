<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Customer</title>
</head>
<body><!----TASK 8---->
    <form method="post" action="{{ route('users-update', [$users -> id]) }}"> 
        @csrf
        <label for="name"> Name</label>
            <input type="text" name="name" value="{{$users->name}}"><br><br>
        
        <label for="email">Email</label>
            <input type="email" name="email" value="{{$users->email}}"><br><br><!---names of fields in table-->
            <input type="submit" value="Update">
    </form>
</body>
</html>