<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movie = Movie::all();

        return view('admin.movies.index' , compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
        $formData = $request->validate();

        $movie = Movie::create([
            'title' => $formData['title'] , 
            'slug' => str()->slug($formData['title']) ,
            'content' => $formData['content'] ,
        ]);

        return redirect()->route('admin.movies.show' , compact('movie'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        return view('admin.movies.show' , compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        return view('admin.movies.edit' , compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $formData = $request->validate();

        $movie->update([
            'title' => $formData['title'] , 
            'slug' => str()->slug($formData['title']) ,
            'content' => $formData['content'] ,
        ]);

        return redirect()->route('admin.movies.show' , compact('movie'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('admin.movies.index');


    }
}
