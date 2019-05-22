<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $movieQuery = Movie::with('actors', 'directors', 'producers');

        if($request->has('id'))
            $movieQuery->orWhere('id', '=', $request->get('id'));

        if($request->has('title'))
            $movieQuery->orWhere('lower(title)', 'LIKE', '%' . strtolower($request->get('title')) . '%');

        $movies = $movieQuery->orderBy('id')->get();

        return response()->json($movies);
    }
}
