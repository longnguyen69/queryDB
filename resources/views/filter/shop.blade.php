@php
    /**
    * @var \App\Shop $shops
    */
@endphp
@extends('master')
@section('content')
    <div class="col-md-8">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Tax Code</th>
                <th scope="col">Status</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($shops as $shop)
                <tr>
                    <td><a href="{{ route('shop.name',['id'=>$shop->id]) }}">{{ $shop->name }}</a></td>
                    <td>{{ $shop->tax_code }}</td>
                    <td>{{ $shop->status }}</td>
                    <td>{{ $shop->address_detail }}</td>
                    <td><a href="#">[edit]</a></td>
                </tr>
            @empty
                <tr>
                    <td>No record</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{ $shops->links()}}
@endsection
