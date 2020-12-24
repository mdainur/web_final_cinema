@extends('movies.layout')
 
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add Movies</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('movies.index') }}"> Back</a>
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
   
<form action="{{ route('movies.store') }}" method="POST">
    @csrf
     <div class="row">
         
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control"  >
            </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Year:</strong>
                <input type="number" name="year" class="form-control"  >
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Small pic url:</strong>
                <input type="text" name="small_pic" class="form-control"  >
            </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Large pic url:</strong>
                <input type="text" name="large_pic" class="form-control"  >
            </div>
        </div> 
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Trailer url:</strong>
                <input type="text" name="trailer_url" class="form-control"  >
            </div>
        </div> 
           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Overview:</strong>
                <textarea class="form-control" style="height:300px" name="overview" ></textarea>
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Rating:</strong>
                <input type="number" name="rating" step="0.1" class="form-control"  >
            </div>
        </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Is premiere:</strong>
                <div class="row">
                Yes<input type="radio" value="1" name="is_premiere"  >
                No<input type="radio" value="0" name="is_premiere"  ></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </div>
   
</form>
@endsection