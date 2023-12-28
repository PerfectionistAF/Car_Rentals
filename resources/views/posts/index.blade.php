<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Posts</title>

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
                <th>    Post ID </th>
                <th>    Post Title  </th>
                <th>    Post Content    </th>
                <th>    Post Date   </th>
            </tr>

            @foreach ($posts as $val)
            
            <tr>
                <td> 
                    {{$val->user_id}}
                </td>
                <td> 
                    {{$val->post_title}}
                </td>
                <td>
                    {{$val->post_content}}
                </td>
                <td>
                    {{$val->post_date}}
                <td>
                <td>
                    <a href="/posts-edit/{{$val->id}}" style="color:purple">Edit</a>
                </td>
                <td>
                    <a href="/posts-show/{{$val->id}}" style="color:blue">Show</a>
                </td>
                <td>
                    <a href="/posts-delete/{{$val->id}}" style="color:blue">Delete</a>
                </td>
            </tr>
            
            @endforeach

        </table>
        <br>
        <a href="{{route('posts-create')}}"><button style="margin: 10px;"><h2 style="color:red">    ADD POST</h2></button></a>
    </body>
<html>
