@extends('movies.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit movie</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('movies.index') }}"> Back</a>
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
  
    <form action="{{ route('movies.update',$movie->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
             
             <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title"  value="{{$movie->title}}"class="form-control"  >
            </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Year:</strong>
                <input type="number" name="year" value="{{$movie->year}}"class="form-control"  >
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Small pic url:</strong>
                <input type="text" name="small_pic" value="{{$movie->small_pic}}" class="form-control"  >
            </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Large pic url:</strong>
                <input type="text" name="large_pic"  value="{{$movie->large_pic}}"class="form-control"  >
            </div>
        </div> 
              <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Trailer url:</strong>
                <input type="text" name="trailer_url" value="{{$movie->trailer_url}}"class="form-control"  >
            </div>
        </div> 
           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Overview:</strong>
                <textarea class="form-control" style="height:300px" name="overview" >{{$movie->overview}}</textarea>
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Rating:</strong>
                <input type="number" value="{{$movie->rating}}"name="rating" step="0.1" class="form-control"  >
            </div>
        </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Is premiere:</strong>
                <div class="row">
                Yes<input type="radio" value="1" name="is_premiere" <?php if ($movie->is_premiere) echo 'checked';?> >
                No<input type="radio" value="0" name="is_premiere" <?php if (!$movie->is_premiere) echo 'checked';?> ></div>
            </div>
        </div>
              
           
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
   
    </form>
@endsection