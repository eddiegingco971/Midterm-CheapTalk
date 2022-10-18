<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::whereHas('posts')->with('posts')->orderBy('name')->paginate(6);
        return view('pages.authors', compact('users'));
    }
}
