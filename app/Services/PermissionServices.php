<?php

namespace App\Services;

use App\Models\Permission;
use GuzzleHttp\Psr7\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PermissionServices extends BaseServices {

    public function __construct(Permission $model)
    {
        parent::__construct($model);
    }
    public function create($request, $role){
        // dd($role);
        Permission::firstOrCreate([
            'name' =>  "role",
            'role_id' => $role->id,
            'create' => $request->role_create,
            'view' => $request->role_view,
            'edit' => $request->role_edit,
            'update' => $request->role_update,
            'delete' => $request->role_delete,
       ]);
       Permission::firstOrCreate([
            'name' => "user",
            'role_id' => $role->id,
            'create' => $request->user_create,
            'view' => $request->user_view,
            'edit' => $request->user_edit,
            'update' => $request->user_update,
            'delete' => $request->user_delete,
       ]);
       Permission::firstOrCreate([
            'name' => "business",
            'role_id' => $role->id,
            'create' => $request->business_create,
            'view' => $request->business_view,
            'edit' => $request->business_edit,
            'update' => $request->business_update,
            'delete' => $request->business_delete,
       ]);
       Permission::firstOrCreate([
            'name' => "bc",
            'role_id' => $role->id,
            'create' => $request->bc_create,
            'view' => $request->bc_view,
            'edit' => $request->bc_edit,
            'update' => $request->bc_update,
            'delete' => $request->bc_delete,
       ]);
       Permission::firstOrCreate([
            'name' => "state",
            'role_id' => $role->id,
            'create' => $request->state_create,
            'view' => $request->state_view,
            'edit' => $request->state_edit,
            'update' => $request->state_update,
            'delete' => $request->state_delete,
       ]);
       Permission::firstOrCreate([
            'name' => "blog",
            'role_id' => $role->id,
            'create' => $request->blog_create,
            'view' => $request->blog_view,
            'edit' => $request->blog_edit,
            'update' => $request->blog_update,
            'delete' => $request->blog_delete,
       ]);
       Alert::Success('Success', 'Role Adedd Successfully');
       return redirect()->route('role.index');
    }
    public function permupdate($name , $roleId, $request) {
        $permission = Permission::where('role_id', $roleId)->where('name', $name)->first();

    if ($permission) {
        $permission->update([
            'create' => $request->{$name.'_create'},
            'view' => $request->{$name.'_view'},
            'edit' => $request->{$name.'_edit'},
            'update' => $request->{$name.'_update'},
            'delete' => $request->{$name.'_delete'}
        ]);
    } else {
        Permission::create([
            'name' => $name,
            'role_id' => $roleId,
            'create' => $request->{$name.'_create'},
            'view' => $request->{$name.'_view'},
            'edit' => $request->{$name.'_edit'},
            'update' => $request->{$name.'_update'},
            'delete' => $request->{$name.'_delete'}
        ]);
    }
    return true;
}
    }

