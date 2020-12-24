@extends('days.layout')
 
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All days</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('days.create') }}"> Add day</a>
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
            <th>Day</th>
               <th>Text</th>
               <th>Finished</th>
             
            <th width="250px">Action</th>
        </tr>
        @foreach ($days as $d)
        <tr>
            <td>{{ $d->id }}</td>
            <td>{{ $d->day }}</td>
             <td>{{ $d->text }}</td>
         <td>{{ $d->finished }}</td>
            
            
            <td>
                <form action="{{ route('days.destroy',$d->id) }}" method="POST">
   
                  
    
                    <a class="btn btn-primary" href="{{ route('days.edit',$d->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        
    </table>
      
      
@endsection

