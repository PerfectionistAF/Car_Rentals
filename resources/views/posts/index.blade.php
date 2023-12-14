<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Customers</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <!--<style>-->
            <link rel="stylesheet" href="../css/form.css">
        <!--</style>-->
    </head>
    <body>
        <table border="2">
            <tr>
                <th>Post Title  </th>
                <th>    Post Content</th>
                <th>    Post Date</th>
            </tr>

            @foreach ($posts as $val)
            
            <tr>
                <td> 
                    {{$val->post_title}}
                </td>
                <td>
                    {{$val->post_content}}
                </td>
                <td>
                    {{$val->post_date}}
                </td>
            </tr>
            
            @endforeach

        </table>

    </body>
<html>

