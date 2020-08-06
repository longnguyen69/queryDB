@extends('master')
@section('content')
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h3>{{ $shop->name }} &nbsp; ({{ $countOrder }} Order)</h3>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Voucher</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Price</th>
                </tr>
                </thead>
                <tbody>
                @forelse($orders as $order)
                    <tr>
                        <th scope="row"><a href="{{ route('order.detail',['id'=>$order->id]) }}">{{ $order->type }}</a></th>
                        <td>{{ $order->voucher->coupon }}</td>
                        <td>{{ $order->discount }}</td>
                        <td>{{ $order->price }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td>No order</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
