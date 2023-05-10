<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Custom Login</title>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
/>
</head>
<body>
    <div class="container">
       <h2>Welcome to Dashboard.</h2>
       <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <th>{{$data->name}}</th>
            <th>{{$data->email}}</th>
            <th><a href="logout">LogOut</a></th>
        </tbody>
       </table>
    </div>
</body>
</html>