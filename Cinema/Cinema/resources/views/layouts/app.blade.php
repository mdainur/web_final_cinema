<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Basic need -->
	<title>Home Cinema</title>


    <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">

	<!-- CSS files -->
	<link rel="stylesheet" href="{{ URL::asset('css/plugins.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

</head>
<body>

<!--login form popup-->
<div class="login-wrapper" id="login-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>Войти</h3>
        <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail почта') }}</label>

                            <div class="col-md-6">
                                <input style="width:300px; " id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>

                            <div class="col-md-6">
                                <input style="width:300px; " id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                <div class="row">

                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <a class="form-check-label" for="remember">
                                        {{ __('Запомнить') }}
                                    </a>
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Войти') }}
                                </button>
<br>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Забыли пароль?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
        <div class="row">
        	<p>Мы в соц сети</p>
            <div class="social-btn-2">
            	<a class="fb" href="#"><i class="ion-social-facebook"></i>Facebook</a>
            	<a class="tw" href="#"><i class="ion-social-twitter"></i>twitter</a>
            </div>
        </div>
    </div>
</div>
<!--end of login form popup-->

<!--signup form popup-->
<div class="login-wrapper"  id="signup-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>Регистрация</h3>
        <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Имя') }}</label>

                            <div class="col-md-6">
                                <input style="width:300px; " id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail почта') }}</label>

                            <div class="col-md-6">
                                <input style="width:300px; " id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
     <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Картинка профиля') }}</label>

                            <div class="col-md-6">
                                <input style="width:300px; " id="profile_pic" type="text" class="form-control @error('email') is-invalid @enderror" name="profile_pic" value="{{ old('profile_pic') }}" required autocomplete="profile_pic">

                                @error('profile_pic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>

                            <div class="col-md-6">
                                <input style="width:300px; " id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Подтвердите Пароль') }}</label>

                            <div class="col-md-6">
                                <input style="width:300px; " id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="width:200px; ">
                                    {{ __('Зарегистрироваться') }}
                                </button>
                            </div>
                        </div>
                    </form>
    </div>
</div>
<!--end of signup form popup-->
    <div id="app">

        <header class=" ht-header" style="background-image: url('../image/ticket.jpg'); color: white !important">
		<div class="container">
			<nav class="navbar navbar-default navbar-custom">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header logo">
						<div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<div id="nav-icon1">
								<span></span>
								<span></span>
								<span></span>
							</div>
						</div>
						<a href="/"><img class="logo" src="image/logo1.png" alt="" width="119" height="58"></a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
                                            <ul class="nav navbar-nav flex-child-menu menu-left "style="display: inline">
							<li class="hidden">
								<a href="#page-top" style="color: white"></a>
							</li>
							<li class="dropdown first">
								<a href="/">
								Главная страница</a>
							</li>
							<li class="dropdown first">
								<a href="/movies_all">
								Фильмы</a>
							</li>
							<li class="dropdown first">
								<a href="/about">
							О нас</a>
							</li>
							<li class="dropdown first">
								<a href="/schedule">
								Расписание</a>
							</li>

                                                        @if (Auth::check())
                                                        @if (Auth::user()->role == "admin")
							<li class="dropdown first">
								<a href="/admin">
								Админ панель</a>
							</li>
              @endif
               @endif
              @if (Auth::check())
              @if (Auth::user()->role == "moderator" )
              <li class="dropdown first">
                <a href="/admin">
                Модератор панель</a>
              </li>

                                                        @endif
                                                         @endif
						</ul>


                                            <ul class="nav navbar-nav flex-child-menu menu-right" style="display: inline">

                                                    @if (Auth::check())


                                                    <li ><a href="{{route('profile')}}">{{Auth::User()->name}}</a></li>
                                                    @else
                                                    <li class="loginLink"><a href="#">Войти</a></li>
                                                    @endif

                                                         @if (Auth::check())

                                                         		 <li class="btn "><a class="dropdown-item" href="{{ route('logout') }}"

                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выйти') }}
                                                            </a>
                                    </li>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>


                                                        @else
                                                         <li class="btn signupLink"><a href="#">Регистрация</a></li>
                                                         @endif
						 </ul>


					</div>
				<!-- /.navbar-collapse -->
			</nav>

			<!-- top search form -->
                        <form action="{{route('movies_all')}}" method="get">
			<div class="top-search">


                            <select>
                                <option>Фильмы</option>

                            </select>

                                 <input type="text" name="title" placeholder="Поиск фильмов">
			</div>
                        </form>

		</div>
	</header>
        <main >

            @yield('content')

        </main>
    </div>
    <!-- footer section-->
	<footer class="ht-footer">
		<div class="container">
			<div class="flex-parent-ft">
				<div class="flex-child-ft item1">
					 <h4>Контакты</h4>
					 <p>Пр. Абая 250<br>
					 Алматы, ALA 00005</p>
					<p>Call us: <a href="#">(+7) 708 270 6036</a></p>
					<p><a href="#">(+7) 701 701 0727</a></p>
				</div>
				<div class="flex-child-ft item2">
					<h4>О компании</h4>
					<ul>
						<li><a href="#">О нас</a></li>
						<li><a href="#">Кинотеатры</a></li>
            <li><a href="#">Партнеры</a></li>
						<li><a href="#">Для бизнеса</a></li>
					</ul>
				</div>
				<div class="flex-child-ft item3">
					<h4>Расписание</h4>
					<ul>
						<li><a href="#">Сегодня в кино</a></li>
						<li><a href="#">Скоро на экранах</a></li>
						<li><a href="#">Эксклюзив</a></li>
					</ul>
				</div>
				<div class="flex-child-ft item4">
					<h4>Технологии</h4>
					<ul>
						<li><a href="#">IMAX</a></li>
						<li><a href="#">Dolby </a></li>
						<li><a href="#">Laser</a></li>
					</ul>
				</div>
				<div class="flex-child-ft item5">
					<h4>Нвостная Рассылка</h4>
					<p>Подпишитесь на нашу систему рассылки новостей, <br> чтобы получать от нас последние новости.</p>
					<form action="#">
						<input type="text" placeholder="Ваш email...">
					</form>
					<a href="#" class="btn">Подписаться сейчас<i class="ion-ios-arrow-forward"></i></a>
				</div>
			</div>
		</div>
		<div class="ft-copyright">
			<div class="ft-left">
				<p>IITU WEB Development</p>
			</div>
			<div class="backtotop">
				<p><a href="#" id="back-to-top">Back to top<i class="ion-ios-arrow-thin-up"></i></a></p>
			</div>
		</div>
	</footer>
	<!-- end of footer section-->

	<script src="{{ URL::asset('js/jquery.js') }}"></script>
	<script src="{{ URL::asset('js/plugins.js')}}"></script>
	<script src="{{ URL::asset('js/plugins2.js')}}"></script>
	<script src="{{ URL::asset('js/custom.js')}}"></script>
</body>
</html>
