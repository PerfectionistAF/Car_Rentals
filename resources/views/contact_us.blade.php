<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Contact us</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <!--<style>-->
            <link rel="stylesheet" href="../css/form.css">
        <!--</style>-->
    </head>
    <body>
        <h1>Contact Us</h1>
        <form method="POST" action="{{ route('readmore') }}"><!---view about_us--->
            @csrf   
        <label for="first_name">First name:</label><br>
        <input type="text" id="first_name" name="first_name"><br>
        
        <label for="last_name">Last name:</label><br>
        <input type="text" id="last_name" name="last_name">
        <input type ="submit" > 
        </form><br>
        <a href= "/admin/{name}"> GET HOME</a>
    </body>
</html>
