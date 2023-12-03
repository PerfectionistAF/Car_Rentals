<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Insert Photo</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <!--<style>-->
            <link rel="stylesheet" href="../css/form.css">
        <!--</style>-->
    </head>
    <body>
        <h1>Insert Photo</h1><br>
        <form method="POST" action="{{ route('photos.store') }}">
            @csrf   <!---hide form data, avoid cross token attacks-->
        <label for="photo_name">Photo name:</label><br>
        <input type="text" id="photo_name" name="photo_name"><br>
        
        <input type ="submit" > 
        
        </form><br>
        <a href= "{{ route('home') }}"> GET HOME</a>
    </body>
</html>