@extends("layouts.app")
@section("title")Categories @endsection
@section("content")
    <div class="container">
        <h2>CATEGORY LIST</h2>
        <a href="{{ route("categories.create") }}" class="mt-2 mb-2 btn btn-primary">Create New Category</a>
    </div>
@endsection
