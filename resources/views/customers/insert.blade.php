<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
</head>
<body><!----SESSION 8---->
    <form method="post" action="{{route('customers-store')}}">
        @csrf
        <label for="name">Customer Name</label>
            <input type="text" name="customer_name"><br><br>
        
        <label for="email">Email</label>
            <input type="email" name="customer_email"><br><br>
            <input type="submit" value="Add Customer">
    </form>
</body>
</html>