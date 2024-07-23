<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function deleteAccount(){
		User::where('id', Auth::id())->delete();
	}
}
