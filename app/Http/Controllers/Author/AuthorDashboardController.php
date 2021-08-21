<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class AuthorDashboardController extends Controller
{
    public function index(){
        return view('author.dashboard');
    }
}
