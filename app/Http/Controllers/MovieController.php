<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        return view('admin.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $people = Person::all();

        return view('admin.movies.create', compact('people'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $movie = Movie::create($data);

        $movie->actors()->sync($request->get('actors'));
        $movie->directors()->sync($request->get('directors'));
        $movie->producers()->sync($request->get('producers'));

        return redirect()->route('movies.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        $people = Person::all();

        $actors = $movie->actors->pluck('id')->toArray();
        $directors = $movie->directors->pluck('id')->toArray();
        $producers = $movie->producers->pluck('id')->toArray();

        return view('admin.movies.edit', compact('movie', 'people', 'actors', 'directors', 'producers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);

        $data = $request->except('_token');
        $movie->update($data);

        $movie->actors()->sync($request->get('actors'));
        $movie->directors()->sync($request->get('directors'));
        $movie->producers()->sync($request->get('producers'));

        return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Movie::find($id)->delete();

        return redirect()->route('movies.index');
    }
}
