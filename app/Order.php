<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;

class Order extends Model
{

    /**
     * Returns oll products in the order
     * @return BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    /**
     * Returns Returns the full order value
     * @return int
     */
    public function getFullPrice()
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->getPriceForCount();
        }
        return number_format($sum, 2, '.', '');

    }

    /** use Illuminate\Http\Request;
     * @param Request $request
     * @return bool
     */
    public function saveOrder(Request $request)
    {
        if ($this->status == 0) {
            $this->name = $request->name;
            $this->address = $request->address;
            $this->phone = $request->phone;
            $this->email = $request->email;
            $this->shipping = $request->shipping;
            $this->status = 1;
            $this->save();
            session()->forget('orderId');
            return true;
        } else {
            return false;
        }

    }
}
