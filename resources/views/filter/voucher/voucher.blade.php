@extends('master')
@section('content')
    <div class="col-md-6">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Coupon</th>
                <th scope="col">Discount</th>
                <th scope="col">Quantity</th>
            </tr>
            </thead>
            <tbody>
            @foreach($vouchers as $voucher)
                <tr>
                    <td><a href="{{ route('voucher.order',['id'=>$voucher->id]) }}">{{ $voucher->title }}</a></td>
                    <td>{{ $voucher->coupon }}</td>
                    <td>{{ $voucher->discount }}</td>
                    <td>{{ $voucher->quantity }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $vouchers->links()}}
    </div>
@endsection
