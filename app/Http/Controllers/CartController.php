<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class CartController
 * @package App\Http\Controllers
 */
class CartController extends Controller
{
    /**
     * Shows all products in the cart
     * @return Application|Factory|View
     */
    public function index()
    {

        if ( is_null( $orderId = session( 'orderId' ) ) ) {
            $orderId = 1;
            session(['orderId' => 1]);
        }
        $order = Order::findOrFail( $orderId );
        $order->status = 0;
        $order->save();

        return view('cart', compact( 'order' ) );
    }

    public function cartAdd( $productId )
    {
        $orderId = session( 'orderId' );

        if (is_null($orderId)) {
            $order = Order::create();
            session( ['orderId' => $order->id] );
        } else {
            $order = Order::find( $orderId );
        }

        if ($order->products->contains( $productId ) ) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($productId);
        }

        return redirect()->route('cart');
    }

    public function cartRemove($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('cart');
        }
        $order = Order::find($orderId);

        if ($order->products->contains($productId)){
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($pivotRow->count < 2) {
                $this->cartAllRemove($productId);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        return redirect()->route('cart');
    }

    public function cartAllRemove($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('cart');
        }
        $order = Order::find($orderId);
        $order->products()->detach($productId);
        return redirect()->route('cart');
    }

}
