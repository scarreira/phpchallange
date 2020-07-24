<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reviews;

class ReviewsController extends Controller
{
    // Insert
    public function createReview(Request $request){
        try {
            // Validate the value...

            $reviews = new Reviews();

            $reviews->idMovie = $request->input('idMovie');
            $reviews->idUser = $request->input('idUser');
            $reviews->rating = $request->input('rating');
            $reviews->review = $request->input('review');
            $reviews->save();

            return response()->json([
                'reviews' => $reviews,
                'status' => '1',
                'msg' => 'success'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => '0',
                'msg' => 'error'
            ]);
        }
    }

    //GET
    public function getAll(){
        $reviews = Reviews::select('id', 'idMovie','idUser', 'rating', 'review')->get();;
        return response()->json($reviews);
    }

    public function getReview(Request $request, $id){
        $reviews = Reviews::select('id', 'idMovie','idUser', 'rating', 'review')->where('id','=', $id)->get();

        if((!$reviews->isEmpty())){
            return response()->json([
                'reviews' => $reviews,
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


    public function getMovieAvgRating(Request $request, $movieId){
        $avgRating = Reviews::select('round(AVG(rating)) AS avg_rating', 'movie')->where('idMovie','=', $movieId)->get();

        if((!$movies->isEmpty())){
            return response()->json([
                'movies' => $avgRating,
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


    //Delete
    public function delById(Request $request, $id){
        $destroy = Reviews::destroy($id);
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
