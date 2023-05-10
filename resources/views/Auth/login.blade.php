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
        <div>
            <form action="{{route('login-user')}}" method="POST">
                @if(Session::has('success'))
                    <div class="alert alert-success ">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger ">{{Session::get('fail')}}</div>
                    @endif
                @csrf
                <div class="row p-0 m-0">
                    <h2>Login</h2>
                    <div class="col-sm-6 row p-0 m-0">
                       
                        <div class="">
                            <input type="email" placeholder="Email" name="email" class="form-control mt-3" value="{{old('email')}}"/>
                            <span class="text-danger">@error('email') {{$message}} @enderror</span>
                        </div>
                        <div class="">
                            <input type="password" placeholder="Password" name="password"class="form-control mt-3" value="{{old('password')}}"/>
                            <span class="text-danger">@error('password') {{$message}} @enderror</span>
                        </div>
                        <div class="col-4"> 
                            <input type="submit" class="form-control bg-success  mt-3"/>
                        </div>
                        <div>
                            <a href="register" class="text-decoration-none">New User....Register Here.</a>
                        </div>
                        <div>
                            <a href="forgotPassword" class="text-decoration-none">Forgot Password.</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>