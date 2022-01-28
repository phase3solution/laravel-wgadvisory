<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SwitchUserController extends Controller
{
    public function switchToUser(Request $request, $id) {
    	$old_user = Session::get('old_user');
		$new_user = User::find( $id );
		if ( empty($old_user) ) Session::put('old_user', Auth::id());
		Auth::login( $new_user );
		return Redirect::route('home');
    }
    public function switchToAdmin() {
		$id = Session::get('old_user');
		$old_user = User::find( $id );
		Session::remove('old_user');
		Auth::login( $old_user );
		return Redirect::route('home');
    }
}
