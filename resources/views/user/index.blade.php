
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Users</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <!--<style>-->
            <link rel="stylesheet" href="../css/form.css">
        <!--</style>-->
    </head>
    <body>
        <table border="2" style="margin: 10px;">
            <tr>
                <th> Name  </th>
                <th>  Email</th>
            </tr>

            @foreach ($users as $val)
            
            <tr>
                <td> 
                    {{$val->name}}
                </td>
                <td>
                    {{$val->email}}
                </td>
                <td><!---retreive id to update then add routes to web.php--->
                    <a href="/users-edit/{{$val->id}}">Edit</a>
                </td>
                <td>
                    <a href="/users-show/{{$val->id}}" style="color:blue">Show</a>
                </td>
                <td>
                    <a href="/users-delete/{{$val->id}}" style="color:blue">Delete</a>
                </td>
            </tr>
            
            @endforeach

        </table>
        <br>
        <a href="{{route('users-create')}}"><button style="margin: 10px;"><h2 style="color:red">    ADD USER</h2></button></a>
    </body>
<html>

