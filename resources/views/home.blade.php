@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Store Manager\'s Dashboard') }}</div>

                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="card text-light bg-primary">
                        <div class="card-body">
                          <h3 class="card-title text-light">Inventory</h3>
                          <p class="card-text">{{$products->count()}} Product(s) in stock</p>
                          <a href="{{route('allProducts')}}" class="btn btn-info border-light text-light">Traverse</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="card text-light bg-danger">
                        <div class="card-body">
                          <h3 class="card-title text-light">Important</h3>
                          <p class="card-text">{{$expired->count()}} Product(s) needs urgnet attention.</p>
                          <a href="{{route('important')}}" class="btn btn-info border-light text-light">Inspect</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

