<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Returns the cost of a product based on its quantity
     * @return float
     */
    public function getPriceForCount()
    {
        $result = 0;
        if (!is_null($this->pivot->count)) {
            $result = round($this->price * $this->pivot->count, 2);
        } else {
            $result = round($this->price, 2);
        }
        return number_format($result, 2, '.', '');
    }
}
