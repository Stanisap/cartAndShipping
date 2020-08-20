@extends('layouts.master')

@section('title', 'Shipping')

@section('content')
    <!-- .form -->
    <form action="{{ route('shipping-confirm') }}" method="POST" class="form">
        @csrf
        <div class="form-group">
            <label for="name" class="form-text">Name*</label>
            <input type="text" name="name" class="form-input" id="name">
            <div class="error-box"></div>
        </div>
        <div class="form-group">
            <label for="address" class="form-text">Address*</label>
            <input type="text" name="address" class="form-input" id="address">
            <div class="error-box"></div>
        </div>
        <div class="form-group">
            <label for="phone" class="form-text">Phone</label>
            <input type="tel" name="phone" class="form-input" id="phone">
            <div class="error-box"></div>
        </div>
        <div class="form-group">
            <label for="email" class="form-text">E-mail</label>
            <input type="email" name="email" class="form-input" id="email">
            <div class="error-box"></div>
        </div>
        <div class="form-group">
            <label for="shipping" class="form-text">Shipping options</label>
            <select type="text"name="shipping" id="shipping" class="form-input">
                @if($order->getFullPrice() > 300)
                    <option value="Free express" selected>Free express shipping</option>
                @else
                    <option value="Free" selected>Free shipping</option>
                    <option value="Express">Express shipping 9.99 €</option>
                    <option value="Courier">Courier shipping 19.99 €</option>
                @endif
            </select>
        </div>
        <div class="right">
            <button type="submit" id="pay" class="btn-pay right" disabled>pay</button>
        </div>
    </form>
    <!-- end .form -->
@endsection
