<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    // insert
    public function insertUser(Request $request){
        $users = new User();

        $users->name = $request->input('name');

        $users->save();
        return response()->json($users);
    }

    // get
    // not used
    public function getAllStamps(){
        $users = User::all();
        return response()->json($users);
    }

    public function getAll(){
        $users = User::select('id', 'name')->get();
        return response()->json($users);
    }

    public function getUser(Request $request, $id){
        $users = User::select('id', 'name')->where('id','=', $id)->get();

        if((!$users->isEmpty())){
            return response()->json([
                'users' => $users,
                'status' => '1',
                'msg' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => '0',
                'msg' => 'error'
            ]);
        }

    }

    // Del
    public function delById(Request $request, $id){
        $destroy = User::destroy($id);
        if($destroy){
            return response()->json([
                'status' => '1',
                'msg' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => '0',
                'msg' => 'fail'
            ]);
        }
    }
}
