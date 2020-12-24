<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/admin', function () {

    if (Auth::check()) {

        $schedules = App\Models\Schedule::all();
        if (Auth::user()->role == "admin" || Auth::user()->role == "moderator") {
            return view('admin',compact('schedules'));
        } else {
            return redirect()->route('index');
        }
    } else {
        return redirect()->route('index');
    }
})->name('admin');

Route::get('/about', function () {
    return view('about');
});
Route::get('/movie_details', function () {
    return view('movie_details');
});

Route::get('/schedule', function () {
    $days = \App\Models\Day::where('finished',0)->get();
    return view('schedule', compact('days'));
});
Route::get('/schedule_details/{schedule_id}', function ($schedule_id) {
    $schedule = \App\Models\Schedule::find($schedule_id);
    return view('schedule_details', compact('schedule'));
})->name('schedule_details');




Route::get('/profile', function () {

    if (Auth::check()) {
        $tickets_un = \App\Models\Ticket::where('user_id', Illuminate\Support\Facades\Auth::user()->id)->where('approved', 0)->get();
        $tickets_ap = \App\Models\Ticket::where('user_id', Illuminate\Support\Facades\Auth::user()->id)->where('approved', 1)->get();
        return view('profile', compact('tickets_un'), compact('tickets_ap'));
    } else {
        return redirect()->route('index');
    }
})->name('profile');

Route::post('/update/{userId}', 'Controller@updateProfile');


Route::post('/updatepass/{userId}', 'Controller@updatepass');
Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');




Route::resource('movies', 'MovieController');
Route::resource('days', 'DayController');
Route::resource('schedules', 'ScheduleController');
Route::resource('tickets', 'TicketController');

Route::post('/buy_tickets', 'Controller@buy_tickets');
Route::post('/reserve', 'Controller@reserve')->name('reserve');


Route::get('/movies_all', function () {
    
    if(isset($_GET['title'])){
        
       $movies = App\Models\Movie::where('title', $_GET['title'] )->orWhere('title', 'like', '%' . $_GET['title'] . '%')->get();  
        
    }
    else
    $movies = \App\Models\Movie::all();
    
   
    return view('all_movies', compact('movies'));
})->name('movies_all');

Route::get('/movie_details/{id}', function ($id) {
    $movie = \App\Models\Movie::find($id);
      return view('movie_details', compact('movie'));
});