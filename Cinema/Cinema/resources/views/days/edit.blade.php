@extends('days.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Day</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('days.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check input field code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('days.update',$day->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
             
            <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                <strong>Day:</strong>
                <input type="date" name="day" value="{{$day->day}}"class="form-control" placeholder="Title">
            </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Text:</strong>
                <input type="text" name="text" value="{{$day->text}}"class="form-control" placeholder="20 December...">
            </div>
        </div>
             
             <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Finished:</strong>
                <div class="row">
                Yes<input type="radio" value="1" name="finished" <?php if ($day->finished) echo 'checked';?> >
                No<input type="radio" value="0" name="finished" <?php if (!$day->finished) echo 'checked';?> ></div>
            </div>
        </div>
              
           
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
   
    </form>
@endsection