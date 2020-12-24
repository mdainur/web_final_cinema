   <?php
 if ( Auth::check()){
     if (Auth::user()->role == "admin" || Auth::user()->role == "moderator"){
     }
 else {
         return redirect()->route("index");
     }

 }
 else {
       return redirect()->route("index");
}

 ?>
 <!DOCTYPE html>
<html>
<head>
<title>ADMIN PANEL </title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="background-color: #020d18; color: white">
   <nav class="navbar navbar-expand-md  shadow-sm" style="background-color: #203040; color: white;">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}" style="color:white">
                Главная страница
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      @if (Auth::check())
        							@if (Auth::user()->role == "admin")
     <li class="nav-item">
                                    <a class="nav-link" href="/days">Дни</a>
                                </li>
                          <li class="nav-item">
                                    <a class="nav-link" href="/movies">Фильмы</a>
                                </li>
                                @endif
                                @endif
                                  <li class="nav-item">
                                    <a class="nav-link" href="/schedules">Расписание</a>
                                </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->


        @if (Auth::check())
      @if (Auth::user()->role == "admin")
         <li class="nav-item">
        <a class="nav-link"style=" color: white;" href="admin">Админ</a>
      </li>
       @endif
         @endif

                        @guest
                            <li class="nav-item">
                                <a class="nav-link"style="color:white" href="{{ route('login') }}">{{ __('Войти') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" style="color:white" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                                </li>
                            @endif


                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

<div class="container">
    @yield('content')
</div>


</body>
</html>
