@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listed Products') }} </div>

                <div class="card-body table-responsive">
                    <a class="btn btn-primary btn-sm" href="{{route('newProduct')}}" role="button">Upload Products</a>
<br>
                    <table class="table table-compact table-striped">
                      <thead>
                        <th>Product name</th>
                        <th>Price</th>
                        <th>Instock</th>
                        <th>Expiry Date</th>
                        <th colspan="2">Actions</th>
                      </thead>
                      <tbody>
                        @foreach($products as $product)
                        <tr>
                          <td>{{$product->name}}</td>
                          <td>{{$product->price}}</td>
                          <td>{{$product->quantity}}
                            @if($product->quantity < 14)
                              <span class="text-danger text-sm">top-up!</span>
                            @endif
                          </td>
                          <td>
                            {{ Carbon\Carbon::parse($product->expirydate)->diffForHumans() }}
                          </td>
                          <td><a class="btn btn-primary btn-sm" href="#" role="button">edit</a></td>
                          <td><a class="btn btn-success btn-sm" href="{{route('viewProduct',[$product->id])}}" role="button">scan</a></td>
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
