<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.user.index', [
            "title" => "Home"
        ]);
    }

    public function profile()
    {
        return view('pages.user.profile', [
            "title" => "Profile"
        ]);
    }
    
    public function about()
    {
        return view('pages.user.about', [
            "title" => "About"
        ]);
    }

}
