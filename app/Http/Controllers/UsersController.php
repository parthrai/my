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



        return view('users.listUsers');
    }

    public function store(Request $request){


         $users=   User::create([
                'name'=>$request['name'],
                'email'=>$request['email'],
                'type' => $request['type'],
                'password' => Hash::make($request['password']),


            ]);

        return response($users->jsonSerialize(), Response::HTTP_CREATED);

    }


    public function delete(Request $request){

        dd($request);

        dd(count($request['delete']));

    }
}
