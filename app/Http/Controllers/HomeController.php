<?php

namespace App\Http\Controllers;

use App\Models\AreaWeServe;
use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\BusinessCategory;
use App\Models\State;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if($user->role_id == 1){
            $bus = Business::count();
            $pending_bus = Business::where('status', 0)->count();
            $active_bus = Business::where('status', 1)->count();
        }
        else{
            $bus = Business::where('user_id', $user->id)->count();
            $pending_bus = Business::where('user_id', $user->id)->where('status', 0)->count();
            $active_bus = Business::where('user_id', $user->id)->where('status', 1)->count();
        }


        $statecount = State::count();
        $citycount = AreaWeServe::count();
        $categorycount = BusinessCategory::count();
        return view('home', compact('bus','statecount','citycount','categorycount', 'pending_bus', 'active_bus'));
    }
    public function login()
    {
        return view('auth.login');
    }
}
