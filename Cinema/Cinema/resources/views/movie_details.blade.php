@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<div class="hero mv-single-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

			</div>
		</div>
	</div>
</div>
<div class="page-single movie-single movie_single">
	<div class="container">
		<div class="row ipad-width2">
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="mv-ceb">
					<img src="{{$movie->large_pic}}" alt="">
				</div>
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="movie-single-ct main-content">
                                    <h1 class="bd-hd">{{$movie->title}}<span style="margin-left: 10px"> {{$movie->year}}</span></h1>
					<div class="movie-rate">
						<div class="rate">
							<i class="ion-android-star"></i>
							<p><span>{{$movie->rating}}</span> /10<br>

							</p>
						</div>
					</div>
					<div class="movie-tabs">
						<div class="tabs">
							<ul class="tab-links tabs-mv">
                                                            <li class=" text-white" style="font-size: 20px">{{$movie->overview}}</li>
							</ul>
                                                    <iframe    data-src="{{$movie->trailer_url}}" style="width: 100%; height: 500px"></iframe>
					</div>
				</div>
			</div>

                            <div class="jumbotron " style="font-size: 20px; background-color: #002752; color:white">
                                <span class="display-3 text-bold">В кинотеатре</span> <br>
                                <?php
                                $sc = App\Models\Schedule::where('movie_id',$movie->id)->orderBy('day_id',"ASC")->get();
                                ?>
                                @foreach($sc as $schedule)
                                @if($schedule->finished==0)
                                <a href="/schedule_details/{{$schedule->id}}">{{$schedule->time}}</a> {{$schedule->day->text}}  <br>
                                @endif

                                @endforeach



                            </div>


		</div>
	</div>
</div>
@endsection
