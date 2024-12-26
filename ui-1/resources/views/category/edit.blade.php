@extends('category.layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Category
                            <a href="{{ url('category') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}" required>
    </div>
    <div>
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" value="{{ $category->description }}" required>
    </div>
    <div>
        <label for="status">Status:</label>
        <input type="checkbox" name="status" value="1" {{ $category->status ? 'checked' : '' }}>
    </div>
    <button type="submit">Update</button>
</form>



                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection