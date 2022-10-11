@extends("layouts.app")
@section("title")Category Details @endsection
@section("content")
    <div class="container">
        <div class="card mt-2">
            <div class="card-header">
                <h4>{{$category->name}}</h4>
            </div>

            <div class="card-body">
                <div>
                    <p><strong>Created At`</strong> {{ $category->created_at }}</p>
                </div>
                <div>
                    <p><strong>Notes`</strong> {{ $category->notes }}</p>
                    <a href="{{ route("categories.edit", $category->id) }}" class="btn btn-success">Edit</a>
                    <form class="d-inline ml-2" action="{{ route("categories.destroy", $category->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Remove</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
