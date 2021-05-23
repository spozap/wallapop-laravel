@extends('templates.template')
@section('content')
    <div class="container">
        @if(is_null($product))
            <p class="h1 col-lg-4 col-12 d-block">The product specified does not exist. :(</p>
        @else
            <div class="row">
                <p class="h2 col-6 d-block text-center"> Product name: {{ $product->name }} </p>
                <p class="h2 col-6 d-block text-center"> Price: {{ $product->price }}  </p>
                <p class="h2 col-12 d-block text-center"> Description: </br> {{ $product->name }} </p>
                <img class="col-12" src="{{ $product->image }}" alt="Alt product image">
            </div>
        @endif
    </div>
@endsection