@extends('templates.template')
@section('content')

        <p class="h1 text-center">Upload product</p>

        <form action="{{route('products.create.post')}}" method="POST">
        @csrf  
        <div class="form-group mb-2">
            <label for="name">Product name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Enter product name">
            @error('name')
            <small> Name is required </small>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Product price">
            @error('number')
            <small> Number is required </small>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="name">Product description</label>
            <input type="text" class="form-control" id="description" name="desc" aria-describedby="name" placeholder="Product description...">
            @error('desc')
            <small> Description is required </small>
            @enderror
        </div>
        <div class="custom-file">
            <input type="file" name="image" id="image">
            <label class="custom-file-label">Seleccionar Archivo</label>
            @error('image')
            <small> An image is required </small>
            @enderror
        </div>
        <button type="submit" class="mt-3 btn btn-primary">Submit</button>
        </form>
    @endsection