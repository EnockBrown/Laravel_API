<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;
use App\Models\Person;

class PersonController extends Controller
{
    /**
     *
     */
    public function show(Person $person):PersonResource
        {
            return new PersonResource($person);
        }

        /**
         * returns person resource collection
         */
        public function index():PersonResourceCollection
        {
            return new PersonResourceCollection(Person::paginate());
        }

        public function store(Request $request)
        {
            $request -> validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'city' => 'required',
                'phone' => 'required',
                'email' => 'required',
            ]);

            //save the newly created person to the database
            $person=Person::create($request->all());
            //getting back the newly created dataset from the database
            return new PersonResource($person);
        }

        //update function
        public function update(Person $person, Request $request):PersonResource
        {
            //dd($request->all());
            $person->update($request->all());


            return new PersonResource($person);
        }

        public function destroy(Person $person)
        {

            $person -> delete();
            return response()->json();
        }
}
