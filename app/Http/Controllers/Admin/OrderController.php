<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barber;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $barber = Barber::query()
            ->whereBelongsTo(auth()->user())
            ->with('orders.capster', 'orders.user')
            ->first();

        return view('pages.admin.order.index', compact('barber'));
    }
}
