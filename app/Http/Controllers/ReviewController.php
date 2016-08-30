<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\ReviewRepository;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{

    public function __construct(ReviewRepository $review)
    {
      $this->review = $review;
    }

    public function index( $url )
    {
      return view('front.review.index', ['url' => $url]);
    }
}
