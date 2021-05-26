@extends('templates.template')
@section('content')
<form action="{{route('category.create')}}" method="POST">
        @csrf  
        <div class="form-group mb-2">
            <label for="name">Category name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Enter product name">
            @error('name')
            <small> Name is required </small>
            @enderror
        </div>
        <button type="submit" class="mt-3 btn btn-primary">Submit</button>
        </form>
@endsection