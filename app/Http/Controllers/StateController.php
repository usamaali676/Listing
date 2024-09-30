<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalHelper;
use App\Models\State;
use Facade\FlareClient\View;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $state = State::all();
        $srno = 1;
        return view('states.index', compact('state', 'srno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('states.create');
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
            'name' => 'required | unique:states,name',
            'img' => 'required',
            'slug' => 'required | unique:states,slug'
        ]);
        State::create([
            'name' => $request->name,
            'image' => GlobalHelper::fts_upload_img($request->img, 'states'),
            'slug' => $request->slug,
        ]);
        Alert::success('Success', "State Created successfully");
        return redirect()->route('state.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $sta = State::find($id);
        return view('states.edit', compact('sta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required | unique:states,name,'.$request->id,
            'slug' => 'required | unique:states,slug,'.$request->id,
        ]);
        $input['name'] = $request->name;
        $input['slug'] = $request->slug;
        if($request->hasFile('img'))
        {

            $img_file = $request->file('img');
            $input['image']=GlobalHelper::fts_upload_img($img_file,'states');
        }
        State::where('id' , $request->id)->update($input);
        Alert::success('Success', "Recode Updated Successfully");
        return redirect()->route('state.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $state =State::find($id);
       delete_img($state->image,'states');
       $state->delete();
       Alert::success('success', "State Deleted Successfully");
       return redirect()->route('state.index');
    }
}
