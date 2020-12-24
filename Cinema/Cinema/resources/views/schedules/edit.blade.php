@extends('schedules.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
<br>
            <div class="pull-left">

                <h2>Редактирование</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-sm float-right" href="{{ route('schedules.index') }}" style="color: white"> Назад</a>
            </div>
        </div>
    </div>
<br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ошибка!</strong> Пожалуйста, проверьте код поля ввода!<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('schedules.update',$schedule->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">

             <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Время:</strong>
                <input type="time" name="time" value="{{$schedule->time}}" class="form-control"  >
            </div>
        </div>
                   <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Цена для детского билета:</strong>
                <input type="number" value="{{$schedule->price_ch}}" name="price_ch" class="form-control"  >
            </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Цена для студенченского билета:</strong>
                <input type="number" value="{{$schedule->price_st}}"name="price_st" class="form-control"  >
            </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Цена для взрослого билета:</strong>
                <input type="number" value="{{$schedule->price_ad}}"name="price_ad" class="form-control"  >
            </div>
        </div>


         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Номер зала:</strong>
                <input type="number" name="hall_number" value="{{$schedule->hall_number}}" class="form-control"  >
            </div>
        </div>
                      <?php

    $movies = \App\Models\Movie::all();
     $days = \App\Models\Day::all();
    ?>


           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Фильм:</strong>
                <select   name="movie_id"   class="form-control">
                   @foreach($movies as $g)
                   <option  <?php if ($g->id == $schedule->movie_id) echo 'selected'; ?>  value="{{$g->id}}">{{$g->title}}</option>
                   @endforeach

                </select>

            </div>
        </div>

           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>День:</strong>
                <select   name="day_id"   class="form-control">
                   @foreach($days as $g)
                   <option <?php if ($g->id == $schedule->day_id) echo 'selected'; ?>  value="{{$g->id}}">{{$g->text}}</option>
                   @endforeach

                </select>

            </div>
        </div>

               <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Закончен:</strong>
                <br>
                <div class="row">
                Да <input style:"margin-left:20px;" type="radio" value="1" name="finished" <?php if ($schedule->finished) echo 'checked';?> >
                Нет <input type="radio" value="0" name="finished" <?php if (!$schedule->finished) echo 'checked';?> >
              </div>
            </div>
        </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </div>

    </form>
@endsection
