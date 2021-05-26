@extends('templates.template')
@section('content')
<form action="{{route('category.put' , ['id' => $category->id] )}}" method="POST">
        @csrf
        @method('put')
        <div class="form-group mb-2">
            <label for="name">Category name</label>
            <input type="text" class="form-control" value="{{ $category->name }}"  name="name" aria-describedby="name" placeholder="Enter product name">
            @error('name')
            <small> Name is required </small>
            @enderror
        </div>
        <button type="submit" class="mt-3 btn btn-primary">Submit</button>
        </form>
@endsection