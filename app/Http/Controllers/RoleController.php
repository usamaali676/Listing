<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Services\PermissionServices;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{

    protected $PermissionServices;

    public function __construct(PermissionServices $PermissionServices)
    {
        $this->PermissionServices = $PermissionServices;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $srno = 1;
        $role = Role::all() ;
        return view('role.Index', compact('srno','role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name'=> 'required | unique:roles,name'
        ]);
       $role = Role::create([
            'name'=> $request->name
        ]);
        $this->PermissionServices->create($request, $role);
        Alert::Success('Success', 'Role Adedd Successfully');
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::where('id', $id)->first();
        $perm_role = Permission::where('role_id', $role->id)->where('name', "role")->first();
        $perm_user = Permission::where('role_id', $role->id)->where('name', "user")->first();
        $perm_business = Permission::where('role_id', $role->id)->where('name', "business")->first();
        $perm_bc = Permission::where('role_id', $role->id)->where('name', "bc")->first();
        $perm_state = Permission::where('role_id', $role->id)->where('name', "state")->first();
        $perm_blog = Permission::where('role_id', $role->id)->where('name', "blog")->first();
        return view('role.edit', compact('role','perm_role','perm_user','perm_business','perm_bc','perm_state','perm_blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role = Role::where('id', $request->id)->first();
        $request->validate([
            'name'=> 'required | unique:roles,name,'.$request->id
        ]);
        $role->update([
            'name'=> $request->name
        ]);
        $modules = ['role', 'user', 'business', 'bc', 'state', 'blog'];
        foreach($modules as $item){
            $this->PermissionServices->permupdate($item, $role->id, $request);
        }
        Alert::Success('Success', 'Role Updated Successfully');
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $role = Role::where('id', $id)->first();
        if($role->id == 1){
            Alert::error('OOps', 'This Role Cant Be Deleted');
            return redirect()->route('role.index');
        }
        else{
        $role->perms()->delete();
        $role->delete();
        }
        Alert::success('Success', 'Role Deletd Succesfully');
        return redirect()->route('role.index');

    }
}
