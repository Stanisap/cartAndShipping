@extends('layouts.master')
@section('title', 'cart')

@section('content')
<!-- .cart-list -->
<ul class="cart-list">
    @foreach($order->products as $product)
    <!-- cart-item -->
    <li class="cart-item placeholder-item">
        <input type="hidden" class="price-product" value="{{ $product->price }}">
        <!-- .cart-img -->
        <div class="cart-img">
            <img src="img/image.png" alt="">
        </div>
        <!-- end .cart- -->
        <!-- .cart-text -->
        <div class="cart-text">
            <h1>{{ $product->name }}</h1>
            <p>{{ $product->description }}</p>
        </div>
        <!-- end .cart-text -->

        <!-- .cart-btn -->
        <div class="cart-btn">
            <!-- .btn-group -->
            <div class="btn-group">

                <form action="{{ route('cart-remove', $product) }}" class="formRemove" method="get">
                    <button class="btn" type="submit">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 512 512" xml:space="preserve">
                            <g fill="#80808080">
                                <path d="M492,236H20c-11.046,0-20,8.954-20,20c0,11.046,8.954,20,20,20h472c11.046,0,20-8.954,20-20S503.046,236,492,236z"/>
                            </g>
                        </svg>
                    </button>
                </form>

                <input type="number" value="{{ $product->pivot->count }}" class="count" max="50" min="1" onkeypress="return false">


                <form action="{{ route('cart-add', $product) }}" method="GET" class="formAdd">
                    <button class="btn" type="submit">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" xml:space="preserve">
                            <g fill="#80808080">
                                <path d="M492,236H276V20c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v216H20c-11.046,0-20,8.954-20,20s8.954,20,20,20h216 v216c0,11.046,8.954,20,20,20s20-8.954,20-20V276h216c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z"/>
                            </g>
                        </svg>
                    </button>
                </form>

            </div>
            <!-- end .btn-group -->
        </div>
        <!-- end .cart-btn -->
        <!-- .cart-right -->
        <div class="cart-right">

            <form class="trash" method="GET" action="{{ route('cart-all-remove', $product) }}">
                @csrf
                <button type="submit" class="trash-btn">
                    <svg class="img-trash" height="15" viewBox="0 0 512 512" width="15" xmlns="http://www.w3.org/2000/svg">
                        <g fill="gray">
                            <path d="m196.187 169.439a6 6 0 0 0 -6 6v213.661a6 6 0 1 0 12 0v-213.661a6 6 0 0 0 -6-6z"/>
                            <path d="m259.511 169.439a6 6 0 0 0 -6 6v213.661a6 6 0 1 0 12 0v-213.661a6 6 0 0 0 -6-6z"/>
                            <path d="m315.813 169.439a6 6 0 0 0 -6 6v213.661a6 6 0 1 0 12 0v-213.661a6 6 0 0 0 -6-6z"/>
                            <path d="m56 77.77h33.036l31.392 394.912.017.187c1.844 16.607 15.167 29.131 30.992 29.131h211.331c15.917 0 29.249-12.605 31.011-29.322l.01-.093 29.194-394.815h33.017a6 6 0 0 0 0-12h-126.989v-24.2a31.425 31.425 0 0 0 -31.203-31.57h-83.616a31.425 31.425 0 0 0 -31.2 31.571v24.2h-126.992a6 6 0 0 0 0 12zm325.835 393.738c-1.152 10.549-9.335 18.492-19.067 18.492h-211.331c-9.675 0-17.852-7.89-19.055-18.368l-31.309-393.862h309.876zm-186.846-429.937a19.412 19.412 0 0 1 19.203-19.571h83.616a19.412 19.412 0 0 1 19.2 19.571v24.2h-122.019z"/>
                        </g>
                    </svg>
                </button>

            </form>
            <div class="total-group">
                <span class="total">{{ $product->getPriceForCount() }}</span>
                <b>&#8364;</b>
            </div>


        </div>
        <!-- end .cart-right -->

    </li>
    <!-- end .cart-item -->
    @endforeach
</ul>
<!-- end .cart-list -->
<div class="cart-total right">
    <span id="full-cost">{{ $order->getFullPrice() }}</span><b>&#8364;</b>
</div>
<a href="{{ route('shipping') }}" class="btn-buy right">Buy</a>
@endsection
