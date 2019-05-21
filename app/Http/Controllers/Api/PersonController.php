<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Person;

class PersonController extends Controller
{
    //
    public function index(Request $request)
    {
        $personQuery = Person::with('aliases', 'asActor', 'asDirector', 'asProducer');

        if($request->has('id'))
            $personQuery->orWhere('id', '=', $request->get('id'));

        if($request->has('first_name'))
            $personQuery->orWhere('first_name', 'LIKE', '%' . $request->get('first_name') . '%');

        if($request->has('last_name'))
            $personQuery->orWhere('last_name', 'LIKE', '%' . $request->get('last_name') . '%');

        $persons = $personQuery->get();

        return response()->json($persons);
    }
}
