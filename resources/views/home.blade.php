<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Home</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <!--<style>-->
            <link rel="stylesheet" href="../css/form.css">
        <!--</style>-->
    </head>
    <body>
        <h1>Hello, 
            <?php 
            #2 alternative methods to return 
            echo $first_name;
            ?>
            <!--written instead of php block-->
            {{$last_name}}
        </h1>
    </body>
    <a href= "{{ route('contact_us') }}"> <h1>GET CONTACT</h1></a><!---view contact_us--->
    <a href= "{{ route('about_us') }}"> <h1>GET ABOUT</h1></a><!---view about_us--->
</html>