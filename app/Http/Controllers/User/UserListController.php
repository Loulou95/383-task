<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Queries\UserQuery;
use App\User;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    public function index() {
        $userList = User::where('is_admin', false)->get();
        return view('user.user-list', ['userList' => $userList]);
    }
}
