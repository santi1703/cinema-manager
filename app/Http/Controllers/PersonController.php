<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = Person::all();

        return view('admin.people.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $persons = Movie::all();

        return view('admin.people.create', compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $person = Person::create($data);

        $person->asActor()->sync($request->get('as_actor'));
        $person->asDirector()->sync($request->get('as_director'));
        $person->asProducer()->sync($request->get('as_producer'));

        return redirect()->route('people.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $person = Person::find($id);
        $movies = Movie::all();

        $asActor = $person->asActor->pluck('id')->toArray();
        $asDirector = $person->asDirector->pluck('id')->toArray();
        $asProducer = $person->asProducer->pluck('id')->toArray();

        return view('admin.people.edit', compact('person', 'movies', 'asActor', 'asDirector', 'asProducer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $person = Person::find($id);

        $data = $request->except('_token');
        $person->update($data);

        $person->asActor()->sync($request->get('as_actor'));
        $person->asDirector()->sync($request->get('as_director'));
        $person->asProducer()->sync($request->get('as_producer'));

        return redirect()->route('people.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Person::find($id)->delete();

        return redirect()->route('people.index');
    }
}
