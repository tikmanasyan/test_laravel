@extends("layouts.app")
@section("title")Categories @endsection
@section("content")
    <div class="container">
        <h2>CATEGORY LIST ({{ count($categories) }})</h2>
        <x-messages />
        <a href="{{ route("categories.create") }}" class="mt-2 mb-2 btn btn-primary">Create New Category</a>
        <table class="table table-hover table-triped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <a class="btn btn-success" href="{{ route("categories.show", $category->id) }}">Details</a>
                            <a class="btn btn-warning" href="{{ route("category-products", $category->id) }}">Show Products</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
