<?php

namespace App\Http\Controllers;

use App\Country;
use App\State;
use App\City;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Gate;
class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        // $states = State::join('countries', 'countries.id','=','states.id')
        //                     ->select('states.id','states.name as state_name','countries.name as country_name')->paginate(15);
        $countries = Country::paginate(15);
        return view('admin.country.index',compact('countries'));
    }


    public function home()
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $countries = Country::paginate(10);
        $country = Country::all();
        $state = State::all();

        $cities = City::join('states', 'states.id','=','cities.id')
        ->select('cities.id','cities.name as city_name','states.name as state_name')->paginate(10);

        $states = State::join('countries', 'countries.id','=','states.id')
        ->select('states.id','states.name as state_name','countries.name as country_name')->paginate(10);
                //   dd($states); die;          

        return view('admin.country.home',compact('countries','country','state','states','cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        return view('admin.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([
            'country_name' => 'required',
            'country_code' => 'required',
            'country_phonecode' => 'required'
         ]);
         $country = New Country();
         $country -> name = $request -> country_name;
         $country -> code = $request -> country_code;
         $country -> phonecode = $request -> country_phonecode;
         $country -> save();
        Toastr::success('State successfully added!','Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Country $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $country = Country::find($id);
        return view('admin.country.edit',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([
           'country_name' => 'required',
           'country_code' => 'required',
           'country_phonecode' => 'required'
        ]);
        $country = Country::find($id);
        $country -> name = $request -> country_name;
        $country -> code = $request -> country_code;
        $country -> phonecode = $request -> country_phonecode;
        $country -> save();
        Toastr::success('Country successfully updated!','Success');
        return redirect()->route('country');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $country = Country::find($id);
        $country -> delete();
        Toastr::error('Country successfully deleted!','Deleted');
        return redirect()->route('country.home');
    }
}
