<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Barber;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $barbers = Barber::query()
            ->get();

        $barberCount = $barbers->count();

        return view('pages.user.index', compact('barbers', 'barberCount'));
    }
    public function detail(Barber $barber)
    {
        $barber->load(['services', 'facilities']);

        return view('pages.user.detail', compact('barber'));
    }
    public function capster()
    {
        return view('pages.user.capster');
    }
    public function profile()
    {
        return view('pages.user.profile');
    }

    public function about()
    {
        return view('pages.user.about');
    }
}
