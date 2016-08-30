<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\ReviewRepository;
use App\Http\Controllers\Api\AuthenticateController;
use App\Http\Controllers\Controller;
use App\Review;

class ReviewController extends Controller
{

    public function __construct(ReviewRepository $review)
    {
      $this->review = $review;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->json($this->review->all(true));
    }

    public function get($url)
    {
      if(is_numeric($url)) {
        return response()->json($this->review->find($url));
      }
      return response()->json($this->review->findByUrl($url));
    }

    public function getPopulars($count = null)
    {
      return response()->json($this->review->populars($count));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = AuthenticateController::getAuthenticatedUser($request);
      $review_url = ReviewRepository::findUniqueUrl($request->title);
      $review = Review::create([
                  'title' => $request->title,
                  'client' => $request->client,
                  'url' => $request->url,
                  'description' => $request->description,
                  'score' => $request->score,
                  'user_id' => $user->id,
                  'review_url' => $review_url,
              ]);
      return response()->json([
      'success' => 'true',
      'message' => 'Reseña creada exitosamente!', 
      'data' => $review
      ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Review::destroy($id);
        return response()->json(['success' => true]);
    }
}
