<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Form</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <!--<style>-->
            <link rel="stylesheet" href="../css/form.css">
        <!--</style>-->
    </head>
    <body>
        <h1>Form Session 3</h1>
        <form method="POST" action="{{ route('receive') }}">
            @csrf   <!---hide form data, avoid cross token attacks-->
        <label for="first_name">First name:</label><br>
        <input type="text" id="first_name" name="first_name"><br>
        
        <label for="last_name">Last name:</label><br>
        <input type="text" id="last_name" name="last_name">
        <a href ="{{ route('home') }}"> <!--WRONG LOGIC, BECAUSE YOU CANNOT HAVE 2 POSTS AT THE SAME TIME-->
            <input type ="submit" > <!--which is first home or receive view? ANSWER:VIEW-->
        </a>
        </form><br>
        <a href= "{{ route('home') }}"> GET HOME</a>
    </body>
</html>