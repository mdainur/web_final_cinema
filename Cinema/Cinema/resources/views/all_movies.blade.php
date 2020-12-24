@extends('layouts.app')
@section('content')

<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1> Фильмы</h1>

				</div>
			</div>
		</div>
	</div>
</div>

<div class="page-single movie_list">
	<div class="container">
		<div class="row ipad-width2">

                    @foreach($movies as $film)
                    <div class="movie-item-style-2">
                                    <img src="{{$film->large_pic}}" style="height: 330px; width: 220px"alt="">
					<div class="mv-item-infor">
						<h6><a href="/movie_details/{{$film->id}}">{{$film->title}} <span>({{$film->year}})</span></a></h6>



						<p class="rate"><i class="ion-android-star"></i><span>{{$film->rating}}</span> /10</p>

						<p class="describe"> {{$film->overview}}</p>





					</div>
				</div>

                    @endforeach






                    </div>

		</div>
	</div>
</div>
@endsection
