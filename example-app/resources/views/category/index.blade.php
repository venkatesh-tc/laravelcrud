@extends('category.layouts')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            @session('status')
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endsession

            <div class="card">
                <div class="card-header">
                    <h4>Categories List
                        <a href="{{ url('category/create') }}" class="btn btn-primary float-end">Add Category</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-stiped table-bordered">
                        <thead>
                            <tr>

                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>{{ $category->status == 1 ? 'Visible':'Hidden' }}</td>
                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ route('category.show', $category->id) }}" class="btn btn-info">Show</a>

                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline">

                                        {{method_field('delete')}}

                                        @csrf


                                        <button type="submit" class="btn btn-danger btnclick btn-delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                            <!-- <script type="text/javascript">
                                console.log("button triggred js");
                                const button = document.querySelector(".btn-delete");
                                console.log("button extracted",button);
                                $(".btn-delete").click(function(e) {
                                    e.preventDefault();
                                    var form = $(this).parents("form");

                                    Swal.fire({
                                        title: "Are you sure?",
                                        text: "You won't be able to revert this!",
                                        icon: "warning",
                                        showCancelButton: true,
                                        confirmButtonColor: "#3085d6",
                                        cancelButtonColor: "#d33",
                                        confirmButtonText: "Yes, delete it!"
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            form.submit();
                                        }
                                    });

                                });
                            </script> -->


                        </tbody>
                    </table>

                    {{ $categories->links() }}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection