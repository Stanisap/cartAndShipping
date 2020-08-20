<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function index()
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('cart');
        }
        $order = Order::find($orderId);
        return view('shipping', compact('order'));
    }

    public function confirm(Request $request)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('cart');
        }
        $order = Order::find($orderId);
        $success= $order->saveOrder($request);
        if ($success) {
            session()->flash('success', 'Вашь заказ принят в обработку!');
        } else {
            session()->flash('warning', 'Случилась ошибка!');
        }
        return redirect()->route('cart');

    }
}
