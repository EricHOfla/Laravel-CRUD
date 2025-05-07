<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Welcome to the Home Page</h1>
        <p class="text-center text-grey-700 "> Here you can find various resources and info</p>
        <div class="text-center mt-5">
            <a href="{{Route('aboutpage')}}" class="btn btn-primary">About Us</a>
            <a href="{{Route('contactus')}}" class="btn btn-secondary">Contact Us</a>
            <a href="{{Route('service')}}" class="btn btn-success">Our Service</a>
        </div>
    </div>
    
</body>
</html>