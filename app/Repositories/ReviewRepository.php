<?php

namespace App\Repositories;

use App\User;
use App\Review;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;

class ReviewRepository
{

    /**
     *
     * Get all the approved reviews.
     *
     * @return Collection
     */
    public function all($approved = true)
    {
        return Review::with('author', 'comments.author')
                        ->where('approved', $approved)->paginate(5);
    }

    public function populars($count)
    {
        $reviews = Review::with('author','comments')
                            ->leftJoin('comments', 'comments.review_id' , '=', 'reviews.id')
                            ->groupBy('comments.review_id')
                            ->orderBy('comment_count', 'DESC')
                            ->where('reviews.approved', '=', true)
                            ->get(['reviews.*', DB::raw('COUNT(comments.id) as comment_count')]);

        //Get current page form url e.g. &page=6
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        //Define how many items we want to be visible in each page
        $perPage = 5;

        $offset = ($currentPage === "1") ? 0 : $currentPage * $perPage;
        //Create a new Laravel collection
        $collection = $reviews;

        //Slice the collection to get the items to display in current page
        $currentPageSearchResults = $collection->slice($offset, $perPage)->all();

        //Create our paginator and pass it to the view
        return new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);

        //return $reviews->paginate($count);

    }

	/**
     * Get all of the reviews for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user, $paginate = false)
    {
        $reviews = Review::where('user_id', $user->id)
                ->orderBy('created_at', 'asc');

        if ($paginate)
        {
            return $reviews->paginate(5);
        }
        return $reviews->get();
    }

    public function find( $id )
    {
      return Review::where('id', $id)->with('comments.author')->get();
    }

    /**
     * Get all of the reviews for a given url
     *
     * @param  (string)  $url
     * @return Review $review
     */
    public static function findByUrl($url)
    {
        $search = ucfirst(str_replace('-', ' ', $url));
        $review = Review::where('title', $search)->with('author' ,'comments.author')->first();

        if( ! is_null($review) )
        {
            return $review;
        }
        //throw new ModelNotFoundException;
        abort(404);
    }

     public static function titleToUrl($title) {
        return strtolower(str_replace(' ', '-', $title));
    }

    public static function findUniqueUrl($title)
    {
        $count = Review::where('title', $title)->count();
        if( $count > 0)
        {
            return self::titleToUrl($title . '-' . $count);
        }
        return self::titleToUrl($title);
    }


}
