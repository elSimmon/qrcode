@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Important messages') }}</div>

                <div class="card-body">
                  <table class="table table-compact table-striped">
                    <thead>
                      <th>Product name</th>
                      <th>Price</th>
                      <th>Instock</th>
                      <th>Expiry Status</th>
                      <th>Actions</th>
                    </thead>
                    <tbody>
                      @foreach($products as $product)
                      <tr>
                        <td>{{$product->name}}</td>
                        <td><strike>N</strike>{{number_format($product->price, 2)}}</td>
                        <td>{{$product->quantity}}</td>
                        <td class="text-danger">
                          {{ Carbon\Carbon::parse($product->expirydate)->diffForHumans() }}
                        </td>
                        <td><a class="btn btn-danger btn-sm" href="{{route('removeProduct',[$product->id])}}" role="button">remove</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
