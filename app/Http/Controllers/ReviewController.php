<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Review;

class ReviewController extends Controller
{
    public function show($url) {
    	
    	$review = Review::findByUrl($url);

    	return view('review', ['review' => $review]);

    }
}
