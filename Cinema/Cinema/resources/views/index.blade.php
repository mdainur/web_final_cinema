@extends('layouts.app')
@section('content')
<div class="slider movie-items">
		<div class="container">
			<div class="row">
				<div class="social-link">
					<p>Подпишитесь на нас: </p>
					<a href="#"><i class="ion-social-facebook"></i></a>
					<a href="#"><i class="ion-social-twitter"></i></a>
					<a href="#"><i class="ion-social-googleplus"></i></a>
					<a href="#"><i class="ion-social-youtube"></i></a>
				</div>
				<div  class="slick-multiItemSlider">

                                    <?php
                                    $premiers = \App\Models\Movie::where('is_premiere', 1)->get();

                                    ?>

                                    @foreach($premiers as $f)
					<div class="movie-item">
						<div class="mv-img">
                                                    <a href="/movie_details/{{$f->id}}"><img src="{{$f->large_pic}}" alt=""   style="width:285px; height: 437px"></a>
						</div>
						<div class="title-in">

							<h6><a href="/movie_details/{{$f->id}}" style="font-size: 15px;">{{$f->title}}</a></h6>
							<p><i class="ion-android-star"></i><span>{{$f->rating}}</span> /10</p>
						</div>
					</div>
                                    @endforeach

				</div>
			</div>
		</div>
	</div>
	<div class="movie-items">
		<div class="container centered">
			<div class="row ipad-width">
					<div class="title-hd">




						<h2>Лучшие фильмы</h2>
						<a href="/movies_all" class="viewall">Все<i class="ion-ios-arrow-right"></i></a>
					</div>
					<div class="tabs">

						<div class="tab-content">
							<div id="tab1" class="tab active">
								<div class="row">
									<div class="slick-multiItem">
                                                                             <?php
                                    $best = \App\Models\Movie::where('rating',">=", 7.5)->orderBy('rating', "DESC")->get();

                                    ?>

                                                                             @foreach($best as $f)
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
                                                                                                    <img src="{{$f->small_pic}}" style="width: 265px; height: 300px">
												</div>
												<div class="hvr-inner">
													<a  href="/movie_details/{{$f->id}}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">{{$f->title}}</a></h6>
													<p><i class="ion-android-star"></i><span>{{$f->rating}}</span> /10</p>
												</div>
											</div>
										</div>
									   @endforeach


									</div>
								</div>
							</div>

						</div>
					</div>
			</div>
		</div>
	</div>

	<div class="trailers">
		<div class="container">
			<div class="row ipad-width">
				<div class="col-md-12">
					<div class="title-hd">
						<h2>На экранах кинотеатра</h2>

					</div>
					<div class="videos">
						 <div class="slider-for-2 video-ft">

                                                      @foreach($premiers as $f)
							 <div>
								<iframe    data-src="{{$f->trailer_url}}"></iframe>
							</div>
                                                      @endforeach



						</div>
						<div class="slider-nav-2 thumb-ft">

                                                      @foreach($premiers as $f)
							<div class="item">
								<div class="trailer-img">
									<img src="{{$f->small_pic}}"   width="4096" height="2737">
								</div>
								<div class="trailer-infor">
									<h4 class="desc">{{$f->title}}</h4>

								</div>
							</div>
                                                    @endforeach




						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
