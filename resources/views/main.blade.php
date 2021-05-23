@extends('templates.template')
@section('content')
        <div class="row col-lg-6 w-100">
            @foreach($products as $p) 
            <div class="card w-50" style="width: 18rem;">
                <img class="card-img-top" src={{ $p->image }} alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $p->name }}</h5>
                    <p class="card-text"> {{ $p->description }}</p>
                    <a href="{{ route('products.index' , ['id' => $p->id ])  }}" class="btn btn-primary">Details</a>
                </div>
            </div>
            @endforeach
        </div>
@endsection