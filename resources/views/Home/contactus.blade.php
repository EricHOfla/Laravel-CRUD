<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5 p-3">
        <div class="text-center">

        <a class="text-center btn btn-primary" href="{{Route('homepage')}}"> Home</a>
        <a class="text-center btn btn-success" href="{{Route('service')}}">Our service</a>
        <h1>Contact Us</h1>
        <p>this is Contact us page</p>
        </div>
        <form action="{{Route('contact.save')}}" method="post">
            @csrf
        <input class="form-control" type="text" name="name" placeholder="Enter Your Full Name"><br>
        <input class="form-control" type="email" name="email"  placeholder="Enter Your Email"><br>
        <input class="form-control" type="text" name="subject"  placeholder="Enter Your Subject"><br>
        <textarea class="form-control"          name="message"  cols="5" rows="4" placeholder="Enter Message"></textarea><br>
        <input class="form-control btn btn-success" type="submit" name="" id="" placeholder="Enter Your Full Name">
        </form>
    </div>

</body>

</html>