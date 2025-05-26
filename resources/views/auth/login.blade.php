<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body class="d-flex justify-content-center">
    <div class="form--container w-100 d-flex justify-content-center mt-5">
        <form action="login" method="POST" class="w-50">
            @csrf
            @method("post")
            <div class="form-group">
                <label for="" class="pb-2">Email : </label>
                <input type="text" class="form-control mb-4" name="email" >
            </div>
            <div class="form-group">
                <label for="" class="pb-2">password : </label>
                <input type="password" class="form-control mb-4" name="password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success mt-4">login</button>
            </div>
        </form>
    </div>

</body>
</html>