@extends('days.layout')
 
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add Day</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('days.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Warning!</strong> Please check your input code<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('days.store') }}" method="POST">
    @csrf
     <div class="row">
         
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Day:</strong>
                <input type="date" name="day" class="form-control" placeholder="Title">
            </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Text:</strong>
                <input type="text" name="text" class="form-control" placeholder="20 December...">
            </div>
        </div>
        
             
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </div>
   
</form>
@endsection