@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <img src="{{asset('img/phoneqrcode.jpg')}}" class="card-img-top" alt="QR Commerce">
                <div class="card-body">
                    <a class="btn btn-primary btn-block btn-sm" href="{{route('allProducts')}}" role="button">Proceed to Products  &raquo;&raquo;</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
