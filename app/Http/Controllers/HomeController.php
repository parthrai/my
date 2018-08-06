<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalAdmin = User::where('type','admin')->count();
        $totalUsers = User::where('type','user')->count();

        $users=array(
            'totalAdmins'=> $totalAdmin,
            'totalUsers'=>$totalUsers,
        );
        return view('home')->with('users',$users);
    }
}
