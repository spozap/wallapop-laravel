@extends('templates.template')
@section('content')
        <div class="row col-lg-6 w-100">
            @foreach($products as $product) 
            <div class="card w-50" style="width: 18rem;">
                <img class="card-img-top" src={{ $product->image }} alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text"> {{ $product->description }}</p>
                    <form action="{{ route('products.delete' , ['id' => $product->id ] ) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit"> Delete </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
@endsection