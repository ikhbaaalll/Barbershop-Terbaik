<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\BookingRequest;
use App\Models\Barber;
use App\Models\Order;
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
    public function capster(Barber $barber)
    {
        $barber = Barber::query()
            ->with('capsters')
            ->withCount('capsters')
            ->find($barber->id);

        return view('pages.user.capster', compact('barber'));
    }
    public function booking(Barber $barber)
    {
        $barber = Barber::query()
            ->with('capsters')
            ->withCount('capsters')
            ->find($barber->id);

        return view('pages.user.booking', compact('barber'));
    }

    public function bookingStore(BookingRequest $bookingRequest, Barber $barber)
    {
        $barber->orders()->create($bookingRequest->validated() + [
            'user_id' => auth()->id()
        ]);

        return redirect()->route('user.profile');
    }

    public function profile()
    {
        $orders = Order::query()
            ->with(['capster', 'barber'])
            ->whereBelongsTo(auth()->user())
            ->get();

        return view('pages.user.profile', compact('orders'));
    }

    public function about()
    {
        return view('pages.user.about');
    }

    public function review(Order $order)
    {
        $validator = validator()->make(request()->all(), [
            'review_star' => ['required', 'in:1,2,3,4,5', 'integer'],
            'review_text' => ['nullable']
        ]);

        $order->update($validator->validated() + [
            'status' => Order::STATUS_REVIEWED
        ]);

        return redirect()->route('user.profile');
    }

    public function cancel(Order $order)
    {
        $order->update([
            'status' => Order::STATUS_CANCEL
        ]);

        return redirect()->route('user.profile');
    }
}
