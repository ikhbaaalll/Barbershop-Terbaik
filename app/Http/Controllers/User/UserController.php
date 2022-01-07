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
            ->withAvg('orders', 'review_star')
            ->get();

        $barbers->transform(function ($barber) {
            $barber->orders_avg_review_star = number_format($barber->orders_avg_review_star, 1);
            $barber->avg_review_star = intval($barber->orders_avg_review_star);
            $barber->avg_review_star_comma = intval(($barber->orders_avg_review_star - $barber->avg_review_star) * 10);
            return $barber;
        });

        $barberCount = $barbers->count();

        return view('pages.user.index', compact('barbers', 'barberCount'));
    }
    public function detail(Barber $barber)
    {
        $barber = Barber::query()
            ->with(['services', 'facilities'])
            ->withAvg('orders', 'review_star')
            ->find($barber->id);

        $barber->orders_avg_review_star = number_format($barber->orders_avg_review_star, 1);
        $barber->avg_review_star = intval($barber->orders_avg_review_star);
        $barber->avg_review_star_comma = intval(($barber->orders_avg_review_star - $barber->avg_review_star) * 10);

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

    public function review(Request $request)
    {
        $order = Order::firstWhere('id', $request['OrderID']);

        $validated_data = $request->validate([
            'review_star' => ['required', 'in:1,2,3,4,5', 'integer'],
            'review_text' => ['nullable']
        ]);

        $order->update($validated_data + [
            'status' => Order::STATUS_REVIEWED
        ]);

        return redirect()->route('user.profile');
    }

    public function cancel(Request $request)
    {
        $order = Order::firstWhere('id', $request['orderID']);
        $order->update([
            'status' => Order::STATUS_CANCEL
        ]);
        
        return redirect()->route('user.profile');
    }
}
