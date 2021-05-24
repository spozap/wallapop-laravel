@extends('templates.template')
@section('content')

        <p class="h1 text-center">Edit product</p>

        <form action="{{ route('products.put' , [ 'id' => $product->id]) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group mb-2">
                <label for="name">Product name</label>
                <input type="text" value="{{ $product->name }}"  class="form-control" name="name" aria-describedby="name" placeholder="Enter product name">
                @error('name')
                <small> Name is required </small>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="price">Price</label>
                <input type="number" value="{{ $product->price }}" class="form-control" name="price" placeholder="Product price">
                @error('number')
                <small> Number is required </small>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="name">Product description</label>
                <input type="text" value="{{ $product->description }}"  class="form-control" name="desc" aria-describedby="name" placeholder="Product description...">
                @error('desc')
                <small> Description is required </small>
                @enderror
            </div>
            <button type="submit" class="mt-3 btn btn-primary">Submit</button>
        </form>

@endsection