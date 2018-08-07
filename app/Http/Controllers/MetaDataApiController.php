<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class MetaDataApiController extends Controller
{
    //

    public function UserData(){

        $user=null;

        if(Auth::check()){
            $user= User::find(Auth::user()->id);

        }

      //dd(Auth::user()->id);
        return response($user->jsonSerialize(), Response::HTTP_OK);


    }
}
