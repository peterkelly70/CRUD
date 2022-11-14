<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Person extends Controller
{
    public function index()
    {
        $person = Person::all()->toArray();
        return array_reverse($person);      
    }
    public function store(Request $request)
    {
        $person = new Person([
            'name' => $request->input('name'),
            'detail' => $request->input('detail')
        ]);
        $person->save();
        return response()->json('Person created!');
    }
    public function show($id)
    {
        $person = Person::find($id);
        return response()->json($person);
    }
    public function update($id, Request $request)
    {
        $person = Person::find($id);
        $person->update($request->all());
        return response()->json('Person updated!');
    }
    public function destroy($id)
    {
        $person = Person::find($id);
        $person->delete();
        return response()->json('Person deleted!');
    }
}

