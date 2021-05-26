@extends('templates.template')
@section('content')
    <div class="row col-lg-6 w-100">
        @foreach($categories as $category) 
            <div class="card w-50" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $category->name }}</h5>
                    <form action="{{ route('category.delete' , ['id' => $category->id ] ) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit"> Delete </button>
                    </form>
                    <a class="btn btn-primary" href="{{ route('category.edit.form' , [ 'id' => $category->id]) }}" role="button">Update</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection