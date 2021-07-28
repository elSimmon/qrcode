@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Product') }}</div>
                <div class="card-img">
                    <img src="{{asset('img/products/'.$product->imagepath)}}" alt="Product Image" class="img img-fluid" height="200px">
                </div>
                <div class="card-body">
                    <div class="row align-content-xxl-center">
                        <div class="col-lg-8 offset-2">

                        </div>
                    </div>
                    <form method="POST" action="{{ route('updateProduct') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Product Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="price" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" required autocomplete="price">

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity to Add') }}</label>

                            <div class="col-md-6">
                                <input id="quantity" type="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ $product->quantity }}" name="quantity" required autocomplete="quantity">

                                @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Product Expiry Date') }}</label>

                            <div class="col-md-6">
                                <input id="expirydate" type="date" class="form-control" name="expirydate" required autocomplete="expirydate" value="{{ $product->expirydate }}">

                                @error('expirydate')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imagepath" class="col-md-4 col-form-label text-md-right">{{ __('Product Image') }}</label>

                            <div class="col-md-6">
                                <input id="imagepath" type="file" class="form-control" name="imagepath" autocomplete="" value="">

                                @error('imagepath')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <p class="text-danger text-sm-end">This will replace the image displayed above</p>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Upload and Generate QR Code') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
