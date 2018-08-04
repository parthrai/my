<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UsersControllerApi extends Controller
{
    public function index(){

        $users=User::all();

        return response(User::all()->jsonSerialize(), Response::HTTP_OK);


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


    public function destroy(Request $request){

        $users= $request['data'];

        foreach($users as $user){
            $usr=User::find($user);
            $usr->delete();

        }

        return response("done", Response::HTTP_CREATED);
     }


     public function getSearchResults(Request $request){



        $terms = $request['query'];



            /*

         $search_query = preg_replace( "/[%\?]+/", "", $search_query ); // Strip SQL metachars
         $search_query = preg_replace( "/^\s+/", "", $search_query );   // Strip leading whitespace
         $search_query = preg_replace( "/\s+$/", "", $search_query );   // Strip trailing whitespace
         $terms        = preg_split( "/\s+/", $search_query, -1, PREG_SPLIT_NO_EMPTY );
*/


         $result = \App\User::where([
             ['name', 'LIKE', '%' . $terms . '%']

         ])->get();



         return response($result->jsonSerialize(), Response::HTTP_OK);


     }
}
