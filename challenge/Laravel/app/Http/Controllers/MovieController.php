<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
    // Insert
    public function insertMovie(Request $request){
        $movies = new Movie();

        $movies->movie = $request->input('movie');

        $movies->save();
        return response()->json($movies);
    }

    //GET
    public function getAll(){
        $movies = Movie::select('id', 'movie')->get();;
        return response()->json($movies);
    }

    public function getMovie(Request $request, $id){
        $movies = Movie::select('id', 'movie')->where('id','=', $id)->get();

        if((!$movies->isEmpty())){
            return response()->json([
                'movies' => $movies,
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

    // Delete
    public function delById(Request $request, $id){
        $destroy = Movie::destroy($id);
        if($destroy){
            return response()->json([
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
}
