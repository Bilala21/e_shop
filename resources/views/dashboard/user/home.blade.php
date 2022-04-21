<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- <a href="{{route('user.logout')}}" 
    onclick="event.preventDafault();
    document.getElementById('logout_form').submit();
    ">Logout</a> --}}
    <h1>{{Auth::user()->name}}</h1>
    <form  method="POST" action="{{route('user.logout')}}" class="d-non" id="logout_form">@csrf
    <button type="submit">user Logout</button>
    </form>
</body>
</html>