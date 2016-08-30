<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Events\UserRegistered;
use App\User;
use Session;

class UserController extends Controller
{
    public function store(StoreUserRequest $request) {

      $user = User::create($request->all());
      event(new UserRegistered($user));
      return response()->json($user);

    }

    /**
  	* Confirm a user's email address.
  	*
  	* @param  string $token
  	* @return mixed
  	*/
  	public function confirmEmail($token)
  	{
  	  User::where('token', $token)->first()->confirmEmail();
  	  Session::flash('message', 'You are now confirmed. Please login.');
  	  return redirect('login');
  	}
}
