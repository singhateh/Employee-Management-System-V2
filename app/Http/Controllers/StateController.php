<?php

namespace App\Http\Controllers;

use App\Country;
use App\State;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Gate;
class StateController extends Controller
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
        $states = State::join('countries', 'countries.id','=','states.id')
                            ->select('states.id','states.name as state_name','countries.name as country_name')->paginate(15);
        $countries = Country::all();
        return view('admin.state.index',compact('countries','states'));
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
        return view('admin.state.create');
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
            'state_name' => 'required',
            'country_id' => 'required'
        ]);
        $state = new State();
        $state -> name = $request -> state_name;
        $state -> country_id = $request -> country_id;
        $state -> save();
        Toastr::success('State successfully added!','Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\State  $id
     * @return \Illuminate\Http\Response
     */
    public function show(State $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\State  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $state = State::find($id);
        return view('admin.state.edit',compact('state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\State  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([
           'state_name' => 'required',
           'country_id' => 'required'
        ]);
        $state = State::find($id);
        $state -> name = $request -> state_name;
        $state -> country_id = $request -> country_id;
        $state -> save();
        Toastr::success('State successfully updated!','Success');
        return redirect()->route('state');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $state = State::find($id);
        $state -> delete();
        Toastr::error('State successfully deleted!','Deleted');
        return redirect()->route('state');
    }
}
