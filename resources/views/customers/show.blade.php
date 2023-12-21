<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Customer Details</title>
</head>
<body>
    <h1>
        Welcome, {{$customer->customer_name}}
    </h1>
    <h2>
        Your email, {{$customer->email}}
    </h2>
    
</body>
</html>