@extends('master')
@section('content')
<div class="col-md-10">
    <div class="card">
        <div class="card-header">
            <h3>{{ $order->type }} &nbsp;Price: {{ number_format($sumOrder->sum) }} VND </h3>
            <h5>({{ $numberProduct }} Product)</h5>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Type</th>
                <th scope="col">Voucher</th>
                <th scope="col">Quantity</th>
                <th scope="col">Discount</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                    <th scope="row"><a href="#">{{ $product->product_stock_id }}</a></th>
                    <td>{{ $order->voucher->coupon}}</td>
                    <td>{{ number_format($product->quantity) }}</td>
                    <td>{{ $product->discount }}</td>
                    <td>{{ number_format($product->price) }}</td>
                </tr>
            @empty
                <tr>
                    <td>No Product</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
