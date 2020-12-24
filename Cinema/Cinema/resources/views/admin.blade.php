@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1 style="margin-left: 200px;">Панель Редактирования</h1>
					<ul class="breadcumb">
						<li class="active"><a href="#">Главная страница</a></li>
						<li> <span class="ion-ios-arrow-right"></span>Админ</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="user-information">
					<div class="user-img">
						 <a href="#"><img src="{{Auth::User()->profile_pic}}" style="height: 250px; width: 250px"alt=""><br></a>
					</div>
					<div class="user-fav">
						<p>Редактирование</p>
						<ul>
							@if (Auth::check())
							@if (Auth::user()->role == "admin")
  <li  class="active"> <a class="col-12 display-4" href="/days">Дни</a> </li>
	  <li  class="active">  <a class="col-12 display-4" href="/movies">Фильмы</a> </li>
@endif
@endif
              <li  class="active">   <a class="col-12 display-4" href="/schedules">Расписание</a> </li>


						</ul>
					</div>
					<div class="user-fav">
						<p>Другие:</p>
						<ul>
                                                    <li style="color: white; font-size: 20px" >Роль: {{Auth::User()->role}}</li>


							<li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выйти') }}
                                                            </a>
                                    </li>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="form-style-1 user-pro" action="#">
					 	   @if ($message = Session::get('success'))
                            <div class="m-2 alert alert-success ">
                                <p style="color: black; font-weight: bold">{{ $message }}</p>
                                </div>
                                      @endif
                                           @if ($message = Session::get('error'))
                            <div class="m-2  alert alert-danger ">
                                <p style="color: black; font-weight: bold">{{ $message }}</p>
                                </div>
                                      @endif
                                     <table class="table table-bordered " style="color: white; font-size: 20px">
        <tr>
            <th style="font-size: 15px;">Id</th>
            <th style="font-size: 15px;">Фильм</th>
             <th style="font-size: 15px;">День</th>
             <th style="font-size: 15px;">Зал</th>
               <th style="font-size: 15px;">Время</th>
               <th style="font-size: 15px;">Закончен</th>

            <th style="font-size: 15px;">Одобрение билетов</th>

        </tr>
        @foreach ($schedules as $d)
        <tr>

            <td style="font-size: 15px;">{{ $d->id }}</td>
            <td style="font-size: 15px;">{{ $d->movie->title }}</td>
            <td style="font-size: 15px;">{{ $d->day->text }}</td>
            <td style="font-size: 15px;">{{ $d->hall_number }}</td>
              <td style="font-size: 15px;">{{ $d->time }}</td>
          <td style="font-size: 15px;">{{ $d->finished }}</td>
          <td>
						<a href="/admin?schedule_id={{$d->id}}#t"  class="btn btn-primary">Одобрение</a></td>


        </tr>
        @endforeach

    </table>


                                    @if(isset($_GET['schedule_id']))

                                    <?php

                                    $tickets_un = \App\Models\Ticket::where('schedule_id',$_GET['schedule_id'])->where('approved',0)->get();
                                     function ryad($iterator) {
                                        $it = 0;

                                        for ($i = 0; $i < 9; $i++) {
                                            for ($j = 0; $j < 12; $j++) {
                                                $it++;
                                                if ($iterator == $it) {

                                                    $pl['row'] = $i + 1;
                                                    $pl['seat'] = $j + 1;

                                                    return $pl;
                                                }
                                            }
                                        }
                                    }
                                    ?>

                                    <div id="t"></div>
                                       @foreach($tickets_un as $ticket)

                                      <div class="jumbotron row" style="font-size:20px; height: 250px; background-image: url('https://wallpaperaccess.com/full/768616.jpg')">


                                          <div class="col-3 text-center">

                                              <img class="  border w-100"src="{{$ticket->user->profile_pic}}" style="width:100%;height:150px">

                                              <span class=" text-center" style="color: white;">{{$ticket->user->name}}</span>
                                          </div>






                                           <div class="col-6 text-center" style="color: white;">

                                               {{ ryad($ticket->place)['row']  }} ряд, {{$ticket->place}} место.<br>

                                               {{ $ticket->type }}
                                                  @if($ticket->type == 'CHILD')
                                               {{ $ticket->schedule->price_ch }} тг <br>
                                               @endif
                                               @if($ticket->type == 'STUDENT')
                                               {{ $ticket->schedule->price_st }} тг <br>
                                               @endif
                                               @if($ticket->type == 'ADULT')
                                               {{ $ticket->schedule->price_ad }} тг <br>
                                               @endif
                                               {{ $ticket->schedule->day->text }}<br>
                                               {{ $ticket->schedule->time }}<br>
                                               {{ $ticket->schedule->hall_number }} зал<br>
                                               <form action="{{ route('tickets.update',$ticket->id) }}" method="POST">


                                                   @csrf
                                                   @method('PUT')

                                                   <button type="submit" class="display-4 btn btn-success" style="font-size: 15px">Одобрить</button>
                                               </form>
                                           </div>


                                           <div class="col-3 text-center" >

                                               <img class="  border  w-100"src="{{$ticket->schedule->movie->small_pic}}" style="width:100%; height:150px">

                                               <span class=" text-center"style="color: white;" >{{$ticket->schedule->movie->title}}</span>
                                           </div>


                                       </div>

                                      @endforeach


                                    @endif



				</div>
			</div>
		</div>
	</div>
</div>




@endsection
