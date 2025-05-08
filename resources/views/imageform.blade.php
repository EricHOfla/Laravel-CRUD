<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    @if (session('success'))
    <div class="text-success">{{session('success')}}</div>
        
    @endif
    <div class="container">
        <h1 class="text-center">Image Upload</h1>
        <form action="{{Route('image.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="product" class="form-control" placeholder="Enter Product Name">
            @error('product')
                <div class="text-danger">{{$message}}</div>
            @enderror
            <input type="number" name="price" class="form-control" placeholder="Enter Product Price">
            @error('price')
                <div class="text-danger">{{$message}}</div>
            @enderror
            <input type="file" name="image" class="form-control" placeholder="Enter Product Image">
            @error('image')
                <div class="text-danger">{{$message}}</div>
            @enderror
            <button class="btn btn-success" type="submit">Upload</button>
        </form>
    </div>
</body>
</html>