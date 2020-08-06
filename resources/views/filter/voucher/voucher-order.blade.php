@extends('master')
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>Title: {{ $voucher->title }}</h3>
                <h5>Order: {{ $number }}</h5>
            </div>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Order Type</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $key => $order)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $order->type }}</td>
                        <td>{{ $order->discount }}</td>
                        <td>{{ $order->price }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
