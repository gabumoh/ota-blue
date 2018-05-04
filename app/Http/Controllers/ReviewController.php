<?php

namespace App\Http\Controllers;
use App\Review;
use Illuminate\Http\Request;
class ReviewController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function showAllReviews()
    {
        $reviews = Review::latest()->take(10)->get();
        return response()->json($reviews, 200);
    }

    // public function showNewReviews()
    // {
    //     $new_Reviews = Review::where('retrieved', 0)->get();
        
    //     foreach( $new_Reviews as $reserve){
    //         $reserve->update([
    //             'retrieved' =>1,
    //         ]);
    //     }
    //     return response()->json($new_Reviews, 200);
        
    //      exit();
    // }

    public function showOneReview(Request $request, $id)
    {
            $review = Review::findOrFail($id);
            
            if ($review) {
                return response()->json($review, 200);
            }else{
                return response()->json('Not Found', 400);            
            }
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $review->update($request->all());

        return response()->json($review,200);
    }

    public function create(Request $request)
    {
        $res = Review::create($request->all());

        return response()->json($res, 201);
    }

    public function delete(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        if ($review) {
            $review->delete();

            return response()->json('Deleted successfully', 200);
        }
        else{
            return response()->json('Review does not exist', 400);
        }
    }   
}
