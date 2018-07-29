<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //

    public function index(){

        $users=User::all();

        return view('users.listUsers')->with('users',$users);
    }

    public function store(Request $request){

            User::create([
                'name'=>$request['name'],
                'email'=>$request['email'],
                'type' => $request['type'],
                'password' => Hash::make($request['password']),


            ]);

            return redirect()->back();
    }
}
