@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __($product->name) }}: NGN{{number_format($product->price)}}, {{$product->quantity}} remaining</div>

                <div class="card-body">
                  <img src="{{asset('img/products/'.$product->imagepath)}}" class="img-thumbnail img-responsive" height="200px" width="150px" alt="{{$product->name}}">
<br><br>
                  {!! QrCode::size(250)->generate('Expiry Date: '.$product->expirydate.', Price: NGN'.number_format($product->price)); !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
