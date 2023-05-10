<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
/>
</head>
<body>
    <div class="container">
        <form action="{{route('reset-Password')}}" method="POST">
           
            <div>
                <input type="email" name="email" class="form-control">
            </div>
            <div>
                <input type="submit" class="form-control bg-success">
            </div>
        </form>
    </div>
</body>
</html>