<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barber;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $barber = Barber::query()
            ->whereBelongsTo(auth()->user())
            ->with('orders.capster', 'orders.user')
            ->first();

        $barber->orders->transform(function ($order) {
            switch ($order->status) {
                case Order::STATUS_WAITING:
                    $order->status = 'Waiting';
                    break;
                case Order::STATUS_CONFIRM:
                    $order->status = 'Confirm';
                    break;
                case Order::STATUS_DONE:
                    $order->status = 'Done';
                    break;
                case Order::STATUS_REJECTED:
                    $order->status = 'Rejected';
                    break;
                case Order::STATUS_CANCEL:
                    $order->status = 'Cancel';
                    break;
                case Order::STATUS_REVIEWED:
                    $order->status = 'Reviewed';
                    break;
                default:
                    $order->status = 'Unknown';
            }
            return $order;
        });

        return view('pages.admin.order.index', compact('barber'));
    }

    public function update(Order $order)
    {
        switch (request()->type) {
            case "1":
                $order->update(['status' => Order::STATUS_CONFIRM]);
                break;
            case "2":
                $order->update(['status' => Order::STATUS_DONE]);
                break;
            case "0":
                $order->delete();
                break;
            default:
                null;
        }

        return redirect()->route('admin.order.index')->with('status', 'Sukses mengubah status');
    }
}
