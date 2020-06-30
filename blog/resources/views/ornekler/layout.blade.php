<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name','Laravel')}}</title>
    <style>
         nav a.active{
             background-color: yellow;
         }
    </style>
</head>
<body>
<nav>

    <!--Helper metodu -->
    <a class="{{is_active('/')}}" href="{{url('/')}}">Anasayfa</a>
    <!----------------->
    <a class="{{is_active('account')}}" href="{{url('account')}}">Account</a>
    <a class="{{request()->is('profile')? 'active' : null}}" href="{{url('profile')}}">Profil</a>
</nav>
<main>
    @yield('content');
</main>

</body>
</html>