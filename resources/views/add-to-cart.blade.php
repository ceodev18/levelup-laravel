@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Products to Cart</h2>
    <form method="POST" action="{{ route('cart.add') }}">
        @csrf
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>${{ $product->price }}</td>
                        <td>
                            <select class="form-control" name="products[{{ $product->id }}]">
                                @for ($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Add to Cart</button>
    </form>
</div>
@endsection
