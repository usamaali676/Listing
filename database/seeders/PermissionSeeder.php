<?php

namespace Database\Seeders;

use App\Helpers\GlobalHelper;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Routing\Route;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::all();
        $routeCollection = GlobalHelper::Permissions();
        foreach($routeCollection as $route){
            foreach($role as $item){
            if($item->id == 1){
                Permission::firstOrCreate([
                    'name' => $route,
                    'role_id' => $item->id,
                    'create' => 1,
                    'view' => 1,
                    'edit' => 1,
                    'update' => 1,
                    'delete' => 1,
                ]);
            }
            else{
                Permission::firstOrCreate([
                    'name' => $route,
                    'role_id' => $item->id,
                    'create' => 0,
                    'view' => 0,
                    'edit' => 0,
                    'update' => 0,
                    'delete' => 0,
                ]);
            }
            }
        }
        // foreach($role as $item)
        // {
        //     Permission::create([
        //         'name' =>
        //     ]);

        // }
    }
}
