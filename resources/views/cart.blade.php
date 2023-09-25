@extends('layouts.app') <!-- Assuming you have a layout file, adjust as needed -->

@section('content')
<div class="container">
    <h1>Your Shopping Cart</h1>

    @if ($cart)
        @if (count($cart->products) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalAmount = 0; // Initialize the total amount
                    @endphp
                    @foreach ($cart->products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->pivot->quantity }}</td>
                            <td>${{ $product->price }}</td>
                            <td>${{ $product->pivot->quantity * $product->price }}</td>
                        </tr>
                        @php
                            $totalAmount += $product->pivot->quantity * $product->price; // Update the total amount
                        @endphp
                    @endforeach
                </tbody>
            </table>

            <div class="text-right">
                <p>Total Price: ${{ $totalAmount }}</p>
                {{-- <a href="{{ route('checkout') }}" class="btn btn-primary">Proceed to Checkout</a> --}}
            </div>
        @else
            <p>Your cart is empty.</p>
        @endif
    @else
        <p>You don't have a shopping cart.</p>
    @endif
</div>
@endsection
