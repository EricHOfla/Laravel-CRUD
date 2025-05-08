<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">
        <h1 class="text-center">All Data In Database</h1>
      <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Product</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
        </tr>
        </thead>
        @foreach ($data as  $all)
            
       <tbody>
        <tr> 
            
            <td>{{$all->product}}</td>
            <td>{{$all->price}}</td>
            <td><img class="" src="{{asset('photo/' . $all->image)}}" alt="Product Picture" width="140" height="80"></td>
        </tr>
        </tbody>
        @endforeach
      </table>
    </div>
</body>
</html>