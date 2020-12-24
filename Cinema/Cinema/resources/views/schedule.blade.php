@extends('layouts.app')
@section('content')

<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Расписание</h1>
					<ul class="breadcumb">
						<li class="active"><a href="#">Главная страница</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="page-single movie_list">
	<div class="container">
		<div class="row ipad-width2">
                    <?php

                       function cmp($a, $b) {
                                     return strcmp($a->time, $b->time);
                                    }

                    ?><div class="col-md-8 col-sm-12 col-xs-12">
                    @foreach($days as $day)
			<?php

                        $day_films = array();


                        ?>
				<div class="topbar-filter">
					<p>  <span>{{$day->text}} </span> </p>

				</div>


                             @foreach($day->movies as $film)

                             <?php

                             $key = false;
                             foreach ($film->schedules as $schedule){
                                 if ($schedule->finished == 0){
                                         $key = true;
                                         break;
                                 }
                             }
                             ?>


                             @if(!in_array($film->id,$day_films ) && $key)

                             <?php

                             $hall1 = [];
                             $hall2 = [];
                             $hall3 = [];
                             $hall4 = [];


                             foreach ($film->schedules as $schedule){
                                 if($schedule->day_id == $day->id && $schedule->finished == 0){
                                 if($schedule->hall_number == 1){
                                  $hall1[] =  $schedule;
                                 }
                                  if($schedule->hall_number == 2){
                                  $hall2[] =  $schedule;
                                 }
                                  if($schedule->hall_number == 3){
                                  $hall3[] =  $schedule;
                                 }
                                  if($schedule->hall_number == 4){
                                  $hall4[] =  $schedule;
                                 }
                                 }
                             }


                            usort($hall1, "cmp");
                             usort($hall2, "cmp");
                              usort($hall3, "cmp");
                               usort($hall4, "cmp");
                             ?>


				<div class="movie-item-style-2">
                                    <img src="{{$film->large_pic}}" style="height: 330px; width: 220px"alt="">
					<div class="mv-item-infor">
						<h6><a href="/movie_details/{{$film->id}}">{{$film->title}} <span>({{$film->year}})</span></a></h6>



						<p class="rate"><i class="ion-android-star"></i><span>{{$film->rating}}</span> /10</p>

						<p class="describe"> </p>

                                                @if (!empty($hall1))
						<p class="run-time"> <span>   1 зал   </span>
                                                    @foreach($hall1 as $sc)
                                                    <span> <a href="/schedule_details/{{$sc->id}}"> {{ $sc->time }} </a>  </span>
                                                    @endforeach

                                                </p>
                                                @endif
                                                 @if (!empty($hall2))
                                                <p class="run-time"> <span>   2 зал   </span>
                                                    @foreach($hall2 as $sc)
                                                    <span>  <a href="schedule_details/{{$sc->id}}"> {{ $sc->time }} </a>    </span>
                                                    @endforeach

                                                </p>
                                                  @endif
                                                 @if (!empty($hall3))
						<p class="run-time"> <span>   3 зал   </span>
                                                    @foreach($hall3 as $sc)
                                                    <span>  <a href="schedule_details/{{$sc->id}}"> {{ $sc->time }} </a>     </span>
                                                    @endforeach

                                                </p>
                                                  @endif
                                                 @if (!empty($hall4))
                                                <p class="run-time"> <span>   4 зал   </span>
                                                    @foreach($hall4 as $sc)
                                                    <span>  <a href="schedule_details/{{$sc->id}}"> {{ $sc->time }} </a>   </span>
                                                    @endforeach

                                                </p>
                                                @endif
					</div>
				</div>

                    <?php

                    $day_films[] = $film->id;

                    ?>
                             @endif

				@endforeach

                    @endforeach
                    </div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="sidebar">
					<div class="searh-form">
						<h4 class="sb-title">Премьеры</h4>
                                                  <?php
                                    $premiers = \App\Models\Movie::where('is_premiere', 1)->orderBy('rating','DESC')->take(3)->get();

                                    ?>

                                    @foreach($premiers as $f)
						<div class="ads">
                                                    <a href="/movie_details/{{$f->id}}"><img src="{{$f->large_pic}}" alt=""></a>
						</div>
                                           @endforeach

					</div>



				</div>
			</div>
		</div>
	</div>
</div>
@endsection
