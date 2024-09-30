<?php

namespace App\Helpers;

use App\Models\Permission;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
class GlobalHelper
{
    public static function  Permissions(){
        $routeCollection = Route::getRoutes()->get();
        foreach ($routeCollection as $item) {
        $name = $item->action;

        if (!empty($name['as'])) {
            $permission = $name['as'];
            $permission = trim(strtolower($permission));
            $permission = str_replace(['.index','.add','.store','.edit','.update','.delete','.single'], '', $permission);
            // $permission = preg_match('/^(?P<entity>[a-z]+)\.(?P<operation>index|view|create|edit|update|delete|conf-delete)$/i',  $permission);
            $ignoreRoutesStartingWith = 'sanctum|livewire|ignition|verification|dashboard|password|logout|register|login|front|contact|listing|search|singcat|cities|test|filter|home|area.destroy';
            $permissionFilled = trim(str_replace("user management ", '', $permission));
            if (preg_match("($ignoreRoutesStartingWith)", $permission) === 0 && filled($permissionFilled)) $permissions[] = $permissionFilled;
            // $permission = preg_match('/^(?P<entity>[a-z]+)\.(?P<operation>index|view|create|edit|update|delete|conf-delete)$/i',  $permission);
            // dd($ignoreRoutesStartingWith);
        }
        }
        $array = $permissions;
        $perm = array_unique($array);
        return $perm;
        // $array = array_unique($permission);
        // $quotedArray = array_map(function ($value) {
        //     settype($value, 'integer');
        //     // return gettype($value);
        // }, $permissions);
        // dd(array_unique($array));
        // dd($permissions);
    }
   public static function  fts_upload_img($img_file,$folder_name)
    {

        $imgpath = 'business/'.$folder_name;
        File::makeDirectory($imgpath, $mode = 0777, true, true);
        $imgDestinationPath = $imgpath.'/';
        $file_name = time()."_".$img_file->getClientOriginalName();
        $success = $img_file->move($imgDestinationPath, $file_name);
        return($file_name);

     }

   public static function  delete_img($img_file,$folder_name)
    {
        $imgpath = 'business/'.$folder_name;
        File::makeDirectory($imgpath, $mode = 0777, true, true);
        $imgDestinationPath = $imgpath.'/';
        $old_image=$imgDestinationPath.$img_file;
        if (File::exists($old_image))
        {
            File::delete($old_image);
            return true;
        }
        else
        {
            return false;
        }
    }
}
