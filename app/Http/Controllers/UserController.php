<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $srno = 1;
        $user = User::all();
        return view('user.index', compact('user', 'srno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        return view('user.add', compact('role'));
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
            'name' => 'required',
            'email' => 'required|unique:users',
        ]);
        $add_user = new User();
    	$add_user->name = $request->name;
    	$add_user->email = $request->email;
    	$add_user->password = Hash::make($request->password);
        $add_user->role_id = $request->role_id;
        $add_user->status =  0;
        $add_user->save();
        Alert::success('Success','User Added Successfully');
    	return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $selectedRole = Role::where('id',$user->role_id)->first();
        $role = Role::all();
        return view('user.edit', compact('user', 'role','selectedRole'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'unique:users,email,'.$request->id,
        ]);
        $newpassword = $request->password;
        $user = User::where('id',$request->id)->first();
        if ($request->password != null) {
            $user->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($newpassword),
                'role_id'=>$request->role_id,
                'status' => $request->status ? 1 : 0 ?? 0,
            ]);
        }
        else{
            $user->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'role_id'=>$request->role_id,
                'status' => $request->status ? 1 : 0 ?? 0,
            ]);
        }
    	if ($user) {
            Alert::success('Success','User Updated successfully');
    		return redirect()->route('user.index');
    	}
    	else{
            Alert::error('Opps!','User Not Updated');
    		return redirect()->route('user.index');
    	}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $user = User::all();
        if ($user->count()==1) {
            Alert::error('Opps!','This Action Can not Perform! Minimun 1 User Required');
            return redirect()->route('user.index');
        }
        else{
            User::where('id',$id)->delete();
            Alert::success('Success','User Deleted successfully');
            return redirect()->route('user.index');
        }
    }
}
