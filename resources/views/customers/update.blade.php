<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
</head>
<body><!----SESSION 8---->
    <form method="post" action="{{ route('customers-update', [$customers -> id]) }}"> 
        <!---customers here is directly returned from controller: "customers" => $customer---->
        @csrf
        <label for="name">Customer Name</label>
            <input type="text" name="customer_name" value="{{$customers->customer_name}}"><br><br>
        
        <label for="email">Email</label>
            <input type="email" name="customer_email" value="{{$customers->email}}"><br><br><!---names of fields in table-->
            <input type="submit" value="Update Customer">
    </form>
</body>
</html>