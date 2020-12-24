@extends('movies.layout')
 
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All movies</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('movies.create') }}"> Add movie</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="m-2 alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered " style="color: white">
        <tr>
            <th>Id</th>
            <th>Title</th>
             <th>Small pic</th>
             <th>Large pic</th>
               <th>Is premiere</th>
               <th>Rating</th>
              <th>Year</th>
              
            <th width="250px">Action</th>
        </tr>
        @foreach ($movies as $d)
        <tr>
            <td>{{ $d->id }}</td>
            <td>{{ $d->title }}</td>
            <td><img src="{{ $d->small_pic }}" style="height: 50px; width: 40"></td>
            <td><img src="{{ $d->large_pic }}" style="height: 50px; width: 40"></td>
              <td>{{ $d->is_premiere }}</td>
          <td>{{ $d->rating }}</td>
            <td>{{ $d->year }}</td>
            
            <td>
                <form action="{{ route('movies.destroy',$d->id) }}" method="POST">
   
                  
    
                    <a class="btn btn-primary" href="{{ route('movies.edit',$d->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        
    </table>
      
      
@endsection

