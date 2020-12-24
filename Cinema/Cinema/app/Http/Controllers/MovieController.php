<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $movies = Movie::all();
        return view('movies.index', compact('movies') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

               'title'=> 'required',
        'is_premiere'=> 'required',
         'rating'=> 'required',
         'trailer_url'=> 'required',
         'small_pic'=> 'required',
         'large_pic'=> 'required',
         'overview'=> 'required',
         'year'=> 'required'
        ]);

        Movie::create($request->all());

        return redirect()->route('movies.index')
                        ->with('success','Фильм успешно добавлен.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
       return view('movies.edit',compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
      $request->validate([

               'title'=> 'required',
        'is_premiere'=> 'required',
         'rating'=> 'required',
         'trailer_url'=> 'required',
         'small_pic'=> 'required',
         'large_pic'=> 'required',
         'overview'=> 'required',
         'year'=> 'required'
        ]);

        $movie->update($request->all());

        return redirect()->route('movies.index')
                        ->with('success','Фильм успешно обновлен.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
         $movie->delete();

        return redirect()->route('movies.index')
                        ->with('success','Фильм успешно удален.');
    }
}
