<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>User Login</title>
</head>
<style>
    .px-4.pb-4.pt-2.loginForm {
        background: #007d81 !important;
    }

</style>

<body>
    <div class="container-fluid p-0 m-0">
        <div style="height: 100vh" class="bg-light d-flex">
            <div class="col-3 m-auto px-4 pb-4 pt-2 rounded loginForm">
                <h2 class="text-center text-white text-uppercase fs-4">User Login</h2>
                <form class="m-auto" action="{{ route('user.check') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label text-white">Email address</label>
                        <input type="email" class="form-control shadow-none border-1" id="email" name="email"
                            aria-describedby="emailHelp" value="{{old('email')}}">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label text-white">Password</label>
                        <input type="password" class="form-control shadow-none border-1" id="password" name="password"
                            aria-describedby="emailHelp" autocomplete="new-password">
                        @error('password')
                           <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary login-submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
