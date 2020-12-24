@extends('layouts.app')
@section('content')
<style>
    .myCheckbox input {
        position: relative;
        z-index: -9999

    }

    .myCheckbox span {
        width: 50px;
        height: 50px;
        display: block;
        margin:0;
        background-color: green;

    }




    .myCheckbox input:checked + span {
        background-color: lightgreen;
    }

    .myCheckbox2 input {
        position: relative;
        z-index: -9999;
    }

    .myCheckbox2 span {
        margin:0;
        width: 50px;
        height: 50px;
        display: block;
        background-color: red;

    }
    ;




</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="hero user-hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="hero-ct">
                    <h1>{{$schedule->movie->title}}</h1>

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
                        <a href="#"><img src="{{$schedule->movie->large_pic}}" style="height: 300px; width: 250px"alt=""><br></a>
                    </div>
                    <div class="user-fav">

                        <ul>
                            <li  class="active">  <a class="col-12 display-4" href="#">  {{$schedule->day->text}} </a>  </li>

                            <li  class="active">  <a class="col-12 display-4" href="#">{{$schedule->time}}</a> </li>
                            <li  class="active">   <a class="col-12 display-4" href="#">{{$schedule->hall_number}} зал</a> </li>


                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="jumbotron  user-pro text-center" style="background-color:#003366 "action="#">

                    <form method="post" action="{{route('reserve')}}">
                        @csrf
                        <?php
                        $places = json_decode($schedule->places, true);

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

                        $ii = 1;
                        ?>
                        @foreach($places as $row)

                        @foreach($row as $place)
                        @if ($place == 0)

                        <label class="myCheckbox m-0 no-gutters ml-3">
                            <input  type="checkbox"

                                    name="place{{$ii}}" value="1"/>
                            <span style="margin: auto 0; color: white; font-size: 30px" >{{$ii}}</span>
                        </label>
                        @else
                        <label class="myCheckbox2 m-0 ml-3">
                            <input   type="checkbox"   onclick="return false;"/>
                            <span style="margin: auto 0; color: white; font-size: 30px" >


                                @if(Auth::check())
                                @if($place === Auth::user()->id)

                                <img style="width: 50px; height: 50px; border: red 3px solid"src="{{Auth::user()->profile_pic}}">
                                @else
                                {{$ii}}
                                @endif

                                @else
                                 {{$ii}}
                                 @endif

                            </span>
                        </label>



                        @endif
                        <?php
                        $ii++;
                        ?>

                        @endforeach

                        <br>

                        @endforeach

                        <input   type="hidden" name="sch_id"  value="{{$schedule->id}}"/>

                        <button class="my-3  btn btn-info " style="font-size: 20px" id="tickets">Выбрать</button>
                    </form>

                    <form method="post" action="/buy_tickets" >
                        @csrf
<?php
$true = false;

for ($i = 0; $i <= 108; $i++) {



    if (session($i)) {
        $true = true;
        ?>


                                <div class="jumbotron row" style="font-size:20px; height: 250px; background-image: url('https://wallpaperaccess.com/full/768616.jpg')">


                                    <div class="col-3 ">

                                        <img class="  border border-primary w-100"src="{{Auth::user()->profile_pic}}" style="width:100%;height:150px">

                                        <span class="col-12" style="color: white; ">{{Auth::user()->name}}</span>
                                    </div>






                                    <div class="col-6 text-center" style="color: white; ">

                                        {{ ryad(session($i))['row']  }} ряд,{{session($i)}} место.<br>

                                        <select style="font-size:15px" class=" form-control"name="{{session($i)}}" style="width:50px;">


                                            <option value="1">
                                                {{$schedule->price_ch}}тг  Детский билет
                                            </option>
                                            <option value="2">
                                                {{$schedule->price_st}}тг  Студенческий билет
                                            </option>
                                            <option value="3">
                                                {{$schedule->price_ad}}тг  Взрослый билет
                                            </option>
                                        </select>
                                        {{ $schedule->day->text }}<br>
                                        {{ $schedule->time }}<br>
                                        {{ $schedule->hall_number }} зал<br>
                                    </div>


                                    <div class="col-3 ">

                                        <img class="  border border-primary w-100"src="{{$schedule->movie->small_pic}}" style="width:100%; height:150px">

                                        <span class="col-12" style="color: white; ">{{$schedule->movie->title}}</span>
                                    </div>


                                </div>








    <?php }
} ?>
                        @if($true)
                        <input   type="hidden" name="sch_id"  value="{{$schedule->id}}"/>

                        <button class="mt-3 btn btn-info " style="font-size: 20px"> Order tickets</button>
                        @endif
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>




@endsection
