@extends('templates.template')
@section('content')

        <form action="{{ route('main') }}">
            <div class="row col-lg-6 w-100">
                <div class="form-group col-6">
                    <label for="exampleInputEmail1">Product name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Potatoes">
                </div>
                <div class="form-group col-6">
                    <label for="exampleInputPassword1">Order by</label>
                    <select class="form-select" name="order" aria-label="Default value">
                        <option selected value=""> None </>
                        <option value="asc"> Price asc </option>
                        <option value="desc"> Price desc </option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary m-2">Search</button>
        </form>    

        <div class="row col-lg-6 w-100">
            @foreach($products as $p) 
            <div class="card w-50" style="width: 18rem;">
                <img class="card-img-top" src={{ $p->image }} alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $p->name }}</h5>
                    <p class="card-text"> {{ $p->description }}</p>
                    <p class="card-text"> {{ $p->price }} € </p>
                    <a href="{{ route('products.index' , ['id' => $p->id ])  }}" class="btn btn-primary">Details</a>
                </div>
            </div>
            @endforeach
        </div>
        @if($products instanceof \Illuminate\Pagination\LengthAwarePaginator ) 
            {{ $products->links() }}
        @endif
@endsection