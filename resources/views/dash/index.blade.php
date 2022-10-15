@extends("layouts.app")
@section("title")Dashboard @endsection
@section("content")
    <div class="container">
        <h1>Welcome {{ Auth::user()->name }}</h1>
        <a href="{{ route("categories.index") }}">Categories</a>
        <a href="{{ route("all-products") }}">Products</a>
        <a href="{{ route("all-posts") }}">Posts</a>
    </div>
@endsection

